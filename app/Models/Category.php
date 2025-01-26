<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model 
{
    use HasFactory,HasTranslations,Filterable;

    protected $fillable=['name','discount_id'];
    public $translatable = ['name'];

    protected $casts  = ['name'=>'array'];

    public function discount(){
        return $this->belongsTo(Discount::class,'discount_id');
    }
}