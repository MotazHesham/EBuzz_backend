<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
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
            'phone' => $this->phone,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'gender' => $this->gender,
            'age' => $this->age,
            'sms_alert' => $this->sms_alert,
            'photo' => $this->photo ? asset('storage/'.$this->photo) : asset('user.png')
        ];



       // return parent::toArray($request);
    }
}
