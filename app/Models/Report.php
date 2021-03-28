<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'id','reason',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'report_users','report_id','user_reporter_id')->withpivot(['reason','user_reported_id']);
    }

}
