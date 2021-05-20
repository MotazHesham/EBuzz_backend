<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;


    protected $fillable = [
        'id','phone', 'password', 'first_name','last_name','address','gender','date_of_birth',
        'sms_alert','latitude','longitude','city','country','block','photo','role_id',
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function emergency()
    {
        return $this->hasMany(Emergency::class);
    }

    public function reports()
    {
        return $this->belongsToMany(Report::class,'report_users','user_reported_id','report_id')->withpivot(['user_reporter_id','note']);
    }

    public function nearest_user()
    {
        return $this->belongsToMany(User::class,'nearest_users');
    }

    public function role()
    {
        return $this->hasOne(Role::class);
    }



}
