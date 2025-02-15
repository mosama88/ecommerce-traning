<?php

namespace App\Models;

use App\Enum\OrderStatusEnum;
use App\Enum\PaymentTypeEnum;
use EloquentFilter\Filterable;
use App\Enum\PaymentStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// #[ScopedBy([OrderStatusEnum::class])]
// #[ScopedBy([PaymentStatusEnum::class])]
// #[ScopedBy([PaymentTypeEnum::class])]

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory, Filterable;

    protected $fillable = [
        'number',
        'shipping_fee',
        'books_total',
        'total',
        'status',
        'payment_status',
        'payment_type',
        'tax_amount',
        'transaction_reference',
        'address',
        'shipping_area_id',
        'user_id'
    ];


    public function shippingArea()
    {
        return $this->belongsTo(ShippingArea::class, 'shipping_area_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}