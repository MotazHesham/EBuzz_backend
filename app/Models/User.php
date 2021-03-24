<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'id','phone', 'password', 'first_name','last_name','adress','gender','date_of_birth',
        'sms_alert','latitude','longitude','city','country','block','role_id',
    ];

    public function user_contact()
    {
        return $this->hasMany(Contact::class);
    }
    public function user_emergency()
    {
        return $this->hasMany(Emergency::class);
    }
    public function user_report()
    {
        return $this->belongsToMany(Report::class);
    }

    public function user_role()
    {
        return $this->hasOne(Role::class);
    }



}
