<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum TipeInputKriteria: string
{
    use EnumToArray;

    case RENTANG_NILAI = 'Rentang Nilai';
    case PILIHAN = 'Pilihan';
}
