<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EditItemResource extends JsonResource
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
            'client_id' => $this->client_id,
            'type' => $this->type,
            'title' => $this->getTranslations('title'),
            'paragraph' => $this->getTranslations('paragraph'),
        ];
    }
}
