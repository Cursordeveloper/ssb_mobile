<?php

declare(strict_types=1);

namespace App\Http\Resources\V1\Mobile\Registration;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class RegistrationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            // Resource type and id
            'type' => 'Customer',

            // Resource exposed attributes
            'attributes' => [
                'resource_id' => $this->resource->resource_id,
                'first_name' => $this->resource->first_name,
                'last_name' => $this->resource->last_name,
                'phone_number' => $this->resource->phone_number,
                'email' => $this->resource->email,
                'password_setup' => $this->password(),
                'pin_setup' => $this->resource->has_pin,
                'status' => $this->resource->status,
            ],
        ];
    }

    protected function password(): bool
    {
        if ($this->resource->password === null || empty($this->resource->password)) {
            return false;
        }

        return true;
    }
}
