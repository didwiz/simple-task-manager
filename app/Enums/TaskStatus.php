<?php

namespace App\Enums;

enum TaskStatus: string
{
    case OPEN = "open";
    case CLOSED = "closed";
}
