<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\date_trait;

class EmergencyResource extends JsonResource
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
            'photo' => $this->user->photo ? asset('storage/'.$this->user->photo) : asset('user.png'),
            'date' => $this->date ? $this->calculate_diff_date($this->date) : '',
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'country' => $this->country,
            'country_code' => $this->country_code,
            'state' => $this->state,
            'city' => $this->city,
            'road' => $this->road,
            'notification_count' => count($this->notification),
            'massage_count' => 1,
        ];
    }
}
