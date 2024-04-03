<?php

namespace App\Enums;

enum tableStatus: string
{
    case Available  =  "available";
    case Notavailable =  "notavailable";
    case Pending =  "pending";
}
