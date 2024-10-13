<?php

declare(strict_types=1);

namespace App\Http\Resources\V1\Mobile\Authentication;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class AuthenticationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            // Resource type and id
            'type' => 'Customer',

            // Resource exposed attributes
            'attributes' => [
                'resource_id' => $this->resource->resource_id,
                'phone_number' => $this->resource->phone_number,
                'first_name' => $this->resource->first_name,
                'last_name' => $this->resource->last_name,
                'status' => $this->resource->status,
            ],
        ];
    }
}
