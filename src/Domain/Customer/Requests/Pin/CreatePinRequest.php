<?php

declare(strict_types=1);

namespace Domain\Customer\Requests\Pin;

use Domain\Mobile\Models\Customer;
use Illuminate\Support\Facades\Http;

final class CreatePinRequest
{
    public static function execute(
        Customer $customer,
        array $request,
    ): array {
        return Http::withHeaders([
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
        ])->post(
            url: config(key: 'services.ssb_customer.base_url').'pin',
            data: [
                'data' => [
                    'type' => 'Pin',
                    'attributes' => [
                        'phone_number' => data_get(target: $customer, key: 'phone_number'),
                        'pin' => data_get(target: $request, key: 'data.attributes.pin'),
                    ],
                ],
            ],
        )->json();
    }
}
