<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'id', 'user_id','status','description','photo','city_id',
    ];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function city(){

        return $this->belongsTo(City::class);

    }



}
