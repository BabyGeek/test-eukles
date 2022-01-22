<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerMaterial extends Pivot
{
    use SoftDeletes;
    //
}
