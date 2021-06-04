<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'id','reason','note',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'report_users','report_id','user_reported_id')->withpivot(['user_reporter_id','note']);
    }

}
