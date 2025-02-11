<?php

namespace App\Enum;

enum InteractionsTypesEnum: int
{
    case Rate = 0;
    case Cart = 1;
    case Favorite = 2;
}
