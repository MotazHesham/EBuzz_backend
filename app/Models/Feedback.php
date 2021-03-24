<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'id', 'emergency_id', 'status','response',
    ];

    public function feedback_emergency()
    {
        return $this->belongsTo(Emergency::class);
    }
}
