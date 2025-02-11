<?php

namespace App\Models\Scopes;

use App\Enum\InteractionsTypesEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class AddToFavoriteScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('interaction_type', InteractionsTypesEnum::Favorite);
    }
}