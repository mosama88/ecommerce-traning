<?php

namespace App\Observers;

use App\Models\AddToCart;

class AddToCartObserver
{
    /**
     * Handle the AddToCart "created" event.
     */
    public function creating(AddToCart $addToCart): void
    {
        dd($addToCart);
    }

    /**
     * Handle the AddToCart "updated" event.
     */
    // public function updated(AddToCart $addToCart): void
    // {
    //     //
    // }

    // /**
    //  * Handle the AddToCart "deleted" event.
    //  */
    // public function deleted(AddToCart $addToCart): void
    // {
    //     //
    // }

    // /**
    //  * Handle the AddToCart "restored" event.
    //  */
    // public function restored(AddToCart $addToCart): void
    // {
    //     //
    // }

    // /**
    //  * Handle the AddToCart "force deleted" event.
    //  */
    // public function forceDeleted(AddToCart $addToCart): void
    // {
    //     //
    // }
}
