<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Motor extends Model
{
    use Notifiable;

    protected $table = "motor";

    protected $guarded = [
        'id'
    ];

    public function this_type()
    {
        return $this->hasOne(MotorType::class, 'id', 'tipe_id');
    }
}
