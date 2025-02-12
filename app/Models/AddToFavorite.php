<?php

namespace App\Models;

use App\Enum\InteractionsTypesEnum;
use Illuminate\Database\Eloquent\Model;
use App\Observers\AddToFavoriteObserver;
use App\Models\Scopes\AddToFavoriteScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ScopedBy([AddToFavoriteScope::class])]
#[ObservedBy([AddToFavoriteObserver::class])]
class AddToFavorite extends Model
{
    /** @use HasFactory<\Database\Factories\AddToFavoriteFactory> */
    use HasFactory;

    protected $table = 'book_interactions';
    protected $fillable = ['book_id', 'user_id', 'interaction_type'];


    public function books()
    {
        return $this->hasMany(Book::class, 'book_id');
    }


    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}