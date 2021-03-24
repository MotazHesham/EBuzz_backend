<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'id','video','emergency_id'
    ];

    public function emergency()
    {
        return $this->belongsTo(Emergency::class);
    }
}
