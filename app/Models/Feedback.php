<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';
    
    protected $fillable = [
        'id', 'emergency_id', 'status','response',
    ];

    public function emergency()
    {
        return $this->belongsTo(Emergency::class);
    }
}
