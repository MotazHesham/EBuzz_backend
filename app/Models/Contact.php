<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'id','user_id','date','latitude','longitude'
    ];

    public function contact_user()
    {
        return $this->belongsTo(User::class);
    }
}
