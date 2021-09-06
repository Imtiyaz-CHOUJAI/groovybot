<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DanceOffCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var  \Illuminate\Http\Resources\Json\JsonResource
     */
    public $collects = DanceOffResource::class;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'meta' => new PaginationResource($this),
        ];
    }
}
