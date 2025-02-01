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
        $discount = $this->discountable;
        $discount_expired = false;
        $current_date = Carbon::now();
        $discount_value = 0;
        if ($discount) {
            if ($discount instanceof Discount) {
                if ($discount->quantity <= 0 || $current_date->diffInDays($discount->expiry_date) <= 0) $discount_expired = true;
            } else {
                $expiry_date = Carbon::createFromFormat("Y-m-d H:i:s", "$discount->date $discount->start_time")->addHours($discount->time);
                if (!$discount->is_active || $current_date->diffInDays($expiry_date) <= 0) $discount_expired = true;
            }
        }

        if (!$discount || $discount_expired) {
            $discount = $this->category->discount;
            if ($discount) {
                if ($discount->quantity <= 0 || $current_date->diffInDays($discount->expiry_date) <= 0) return 0;
            }
        }
    }
}