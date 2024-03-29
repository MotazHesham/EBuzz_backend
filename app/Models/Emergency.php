<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    protected $fillable = [
        'id', 'longitude','latitude','country','country_code','state','city','road','user_id','status','mssg_count','feedback',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }

    public function video()
    {
        return $this->hasOne(Video::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
}
