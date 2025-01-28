<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FlashSale extends Model
{
    use HasFactory, Filterable,HasTranslations;
    protected $table = 'flash_sales';
    public $translatable = ['name', 'description'];

    protected $casts = ['name' => 'array', 'description' => 'array'];
    protected $fillable = ['name', 'description', 'date', 'time','start_time', 'percentage', 'is_active'];
}
