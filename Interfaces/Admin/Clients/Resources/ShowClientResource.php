<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Resources;

class ShowClientResource extends ClientResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'items' => ShowItemResource::collection($this->getItems()),
        ];
    }
}
