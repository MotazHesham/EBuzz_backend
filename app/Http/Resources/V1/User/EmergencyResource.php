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
        $first = $this->user->first_name ?? '';
        $last = $this->user->last_name ?? '';
        if($this->user){
            $image = $this->user->photo ? asset('storage/'.$this->user->photo) : asset('user.png');
        }else{
            $image = asset('user.png');
        }
        return [
            'id'=>$this->id,
            'user_name' => $first . ' ' . $last,
            'phone' => $this->user->phone ?? '',
            'photo' => $image,
            'date' => $this->created_at ? $this->calculate_diff_date($this->created_at) : '',
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'country' => $this->country,
            'country_code' => $this->country_code,
            'state' => $this->state,
            'city' => $this->city,
            'road' => $this->road,
            'status' => intval($this->status),
            'notification_count' => count($this->notification),
            'massage_count' => $this->mssg_count,
        ];
    }
}
