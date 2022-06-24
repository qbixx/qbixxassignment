<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowItemResource extends JsonResource
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
            'type' => $this->type,
            'title' => $this->title,
            'paragraph' => $this->paragraph,
        ];
    }
}
