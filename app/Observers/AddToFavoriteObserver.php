<?php

namespace App\Observers;

use App\Models\AddToFavorite;
use App\Enum\InteractionsTypesEnum;

class AddToFavoriteObserver
{
    public function creating(AddToFavorite $addToFavorite)
    {
        $addToFavorite->interaction_type = InteractionsTypesEnum::Favorite;
    }
}