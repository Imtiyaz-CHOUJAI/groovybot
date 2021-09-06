<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DanceOffResource extends JsonResource
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
            'firstContender' => new RobotResource($this->firstContender),
            'secondContender' => new RobotResource($this->secondContender),
            'winner' => new RobotResource($this->winner),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
