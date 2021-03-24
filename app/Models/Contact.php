<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'id','phone','first_name','last_name','user_id'
    ];

    public function contact_user()
    {
        return $this->belongsTo(User::class);
    }
}
