<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\date_trait;
use App\Models\City;

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
        $status = '';
        if($this->status == 0){
            $status = 'pending';
        }elseif($this->status == 1){
            $status = 'Accepted';
        }elseif($this->status == 2){
            $status = 'Refused';
        }
        $first = $this->user->first_name ?? '';
        $last = $this->user->last_name ?? '';
        if($this->user){
            $image = $this->user->photo ? asset('storage/'.$this->user->photo) : asset('user.png');
        }else{
            $image = asset('user.png');
        }
        return [
            'id'=>$this->id,
            'user_name' => $first . ' ' . $last ,
            'user_photo' => $image ,
            'date' => $this->created_at ? $this->calculate_diff_date($this->created_at) : '',
            'description' => $this->description,
            'photo' => asset('storage/'.$this->photo),
            'city' => $this->city->name ?? City::first()->name,
            'city_id' => intval($this->city ? $this->city_id : City::first()->id),
            'status' => $status,
        ];
    }
}
