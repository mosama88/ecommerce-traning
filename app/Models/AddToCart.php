<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    /** @use HasFactory<\Database\Factories\AddToCartFactory> */
    use HasFactory;

    protected $table = 'add_to_carts';
    protected $fillable = ['book_id', 'user_id', 'quantity'];
}
