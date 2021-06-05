<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class EmergencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    { 
        return [
            'id'=>$this->id,
            'user_name' => $this->user->first_name . ' ' . $this->user->last_name,
            'photo' => $this->user->photo ? asset('storage/'.$this->user->photo) : asset('user.png'),
            'date' => $this->date,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'country' => $this->country,
            'country_code' => $this->country_code,
            'state' => $this->state,
            'city' => $this->city,
            'road' => $this->road,
        ];
    }
}
