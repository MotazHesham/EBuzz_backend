<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'id','reason',
    ];

    public function report_user()
    {
        return $this->belongsTomany(User::class);
    }

}
