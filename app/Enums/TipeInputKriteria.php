<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum TipeInputKriteria: string
{
    use EnumToArray;

    case NILAI = 'Input Nilai';
    case PILIHAN = 'Pilihan';
}
