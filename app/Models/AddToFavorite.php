<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddToFavorite extends Model
{
    /** @use HasFactory<\Database\Factories\AddToFavoriteFactory> */
    use HasFactory;

    protected $table = 'add_to_favorites';
    protected $fillable = ['book_id', 'user_id'];


    public function books()
    {
        return $this->hasMany(Book::class, 'book_id');
    }


    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
