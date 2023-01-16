<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Enums\RoutesEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class ClientResource extends JsonResource
{
    public static function collectResources(Collection $clients): array
    {
        return $clients->map(
            function ($client) {
                return (new self($client))->toArray(new Request);
            }
        )->toArray();
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'editUrl' => route(RoutesEnum::ADMIN_EDIT_CLIENT, $this),
            'deleteUrl' => route(RoutesEnum::ADMIN_DELETE_CLIENT, $this),
            'showUrl' => route(RoutesEnum::FRONT_SHOW_CLIENT, [$this]),
        ];
    }
}
