<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Service extends Model
{
    use Notifiable;

    protected $guarded = [
        'id'
    ];

    public function this_user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function this_admin()
    {
        return $this->hasOne(User::class, 'id', 'admin_id');
    }

    public function this_bike()
    {
        return $this->hasOne(Motor::class, 'id', 'motor_id');
    }
}
