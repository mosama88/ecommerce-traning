<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingArea extends Model
{
    /** @use HasFactory<\Database\Factories\ShippingAreaFactory> */
    use HasFactory, Filterable;
    protected $table = 'shipping_areas';
    protected $fillable = ['name', 'fee'];
}
