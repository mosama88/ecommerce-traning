<?php

namespace App\Models;

use Carbon\Carbon;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Book extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\BookFactory> */


    use HasFactory, InteractsWithMedia, Filterable;
    public $fillable = [
        'name',
        'description',
        'slug',
        'image',
        'quantity',
        'rate',
        'publish_year',
        'price',
        'is_available',
        'category_id',
        'publisher_id',
        'author_id',
        'discountable_type',
        'discountable_id'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }


    //* 2.1
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    //* 2.2
    public function publishers()
    {
        return $this->belongsTo(Publisher::class);
    }

    //* 2.3
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function discountable()
    {
        return $this->morphTo();
    }



    function getActiveDiscountValue()
    {
        $discount = $this->getValidDiscount();
        return $discount?->percentage;
    }

    function getValidDiscount()
    {
        $discount = $this->discountable;
        if ($discount && !$this->isDiscountExpired($discount)) return $discount;
        $category_discount = $this->category->discount ?? null;
        if ($category_discount && !$this->isDiscountExpired($discount)) return $category_discount;
    }

    function isDiscountExpired($discount)
    {
        // check if discount object from Discount model return is this discount expired or not based on discount expiration critire
        if ($discount instanceof Discount) return $discount->quantity <= 0 || $discount->expiry_date->isPast();
        // if discout is flash sale so this code will run to check if this flash sale is expired or not
        $expiry_date = Carbon::createFromFormat("Y-m-d H:i:s", "$discount->date $discount->start_time")->addHours($discount->time);
        return !$discount->is_active || $expiry_date->isPast();
    }
}