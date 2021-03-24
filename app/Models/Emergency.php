<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    protected $fillable = [
        'id', 'date', 'longitude','latitude','user_id',
    ];
    public function emergency_user()
    {
        return $this->belongsTo(User::class);
    }

    public function emergency_feedback()
    {
        return $this->hasOne(Feedback::class);
    }

    public function emergency_video()
    {
        return $this->hasOne(Video::class);
    }

    public function emergency_notification()
    {
        return $this->hasMany(Notification::class);
    }
}
