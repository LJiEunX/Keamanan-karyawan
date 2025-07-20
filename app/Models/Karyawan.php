<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    //
    public function gaji()
    {
        return $this->hasOne(Gaji::class);
    }
}
