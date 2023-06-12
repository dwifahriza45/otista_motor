<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sparepart extends Model
{
    use Notifiable;

    protected $guarded = [
        'id'
    ];
}
