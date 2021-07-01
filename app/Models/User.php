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
        'id','phone', 'password', 'first_name','last_name','address','gender','age','fcm_token',
        'sms_alert','latitude','longitude','country','country_code','state','city','road','block','photo','role_id',
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function emergency()
    {
        return $this->hasMany(Emergency::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'report_users','user_reported_id','user_reporter_id')->withpivot(['reason']);
    } 

    public function role()
    {
        return $this->belongTo(Role::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
