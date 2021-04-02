<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'id','emergency_id','user_id',
    ];

    public function emergency()
    {
        return $this->belongsTo(Emergency::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
