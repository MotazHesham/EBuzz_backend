<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'photo'=>$this->emergency->user->photo ,
            'user' => $this->emergency->user->first_name . ' ' . $this->emergency->user->last_name,
            'emergency' => new EmergencyResource($this->emergency),

        ];

    }
}
