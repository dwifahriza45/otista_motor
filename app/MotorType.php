<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MotorType extends Model
{
    use Notifiable;

    protected $table = "motor_type";

    protected $guarded = ['id'];
}
