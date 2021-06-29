<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\date_trait;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    
    use date_trait;
    
    public function toArray($request)
    { 
        return [
            'id'=>$this->id,
            'user_name' => $this->user->first_name . ' ' . $this->user->last_name,
            'user_photo' => $this->user->photo ? asset('storage/'.$this->user->photo) : asset('user.png'),
            'date' => $this->created_at ? $this->calculate_diff_date($this->created_at) : '',
            'description' => $this->description,
            'photo' => asset('storage/'.$this->photo),
            'city' => $this->city->name,
            'city_id' => $this->city_id,
            'status' => $this->status,
        ];
    }
}
