<?php

namespace App\Models;

use App\Enum\InteractionsTypesEnum;
use App\Observers\AddToCartObserver;
use App\Models\Scopes\AddToCartScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;


#[ScopedBy([AddToCartScope::class])]
#[ObservedBy([AddToCartObserver::class])]

class AddToCart extends Model
{
    /** @use HasFactory<\Database\Factories\AddToCartFactory> */
    use HasFactory;

    protected $table = 'book_interactions';
    protected $fillable = ['book_id', 'user_id', 'quantity', 'interaction_type'];
    protected $casts = ['interaction_type' => InteractionsTypesEnum::class];



    public function books()
    {
        return $this->hasMany(Book::class, 'book_id');
    }


    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}