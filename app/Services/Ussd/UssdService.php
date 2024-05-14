<?php

declare(strict_types=1);

namespace App\Services\Ussd;

class UssdService
{
    public string $base_url;

    public string $api_key;

    public function __construct()
    {
        $this->base_url = config(key: 'services.susubox.ssb_ussd.base_url');
        $this->api_key = config(key: 'services.susubox.ssb_ussd.api_key');
    }
}
