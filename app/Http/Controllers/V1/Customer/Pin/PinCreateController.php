<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Pin;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Pin\PinCreateRequest;
use Domain\Customer\Actions\Pin\PinCreateAction;
use Domain\Mobile\Models\Customer;

final class PinCreateController extends Controller
{
    public function __invoke(Customer $customer, PinCreateRequest $request): array
    {
        // Execute the CreatePinAction
        return PinCreateAction::execute(customer: $customer, request: $request->validated());
    }
}
