<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\AddToFavoriteScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[ScopedBy([AddToFavoriteScope::class])]

class AddToFavorite extends Model
{
    /** @use HasFactory<\Database\Factories\AddToFavoriteFactory> */
    use HasFactory;

    protected $table = 'book_interactions';
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