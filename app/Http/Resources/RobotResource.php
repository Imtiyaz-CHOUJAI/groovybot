<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RobotResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'powerMove' => $this->power_move,
            'experience' => $this->experience,
            'outOfOrder' => $this->out_of_order,
            'avatar' => $this->avatar,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
