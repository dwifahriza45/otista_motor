<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class KategoriSparepart extends Model
{
    use Notifiable;

    protected $table = "kategori_sparepart";

    protected $guarded = ['id'];
}
