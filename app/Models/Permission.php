<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'id','title',
    ];

    public function permession_role()
    {
        return $this->belongsToMany(Role::class);
    }
}
