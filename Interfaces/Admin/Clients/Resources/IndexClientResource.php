<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IndexClientResource extends JsonResource
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
        ];
    }
}