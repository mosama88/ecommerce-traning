<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookOrder extends Model
{
    /** @use HasFactory<\Database\Factories\BookOrderFactory> */
    use HasFactory;
    protected $table = 'book_orders';
    protected $fillable = ['book_id', 'order_id', 'price', 'quantity'];


    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }


    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}