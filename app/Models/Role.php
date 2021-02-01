<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'id','title',
    ];

    public function role_user()
    {
        return $this->belongsTo(User::class);
    }

    public function role_permession()
    {
        return $this->belongsToMany(Permission::class);
    }
}
