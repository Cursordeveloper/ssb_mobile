<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\LinkedAccount;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\LinkedAccount\LinkAccountRequest;
use App\Services\SusuboxServices;
use Domain\Customer\Actions\Common\GetCustomerAction;
use Domain\Customer\DTO\LinkedAccountDTO\LinkedAccountDTO;
use Domain\Customer\Jobs\LinkedAccount\LinkAccountJob;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class LinkAccountController extends Controller
{
    public function __invoke(LinkAccountRequest $request, SusuboxServices $susuboxServices): array
    {
        // Get the Customer
        $customer = GetCustomerAction::execute(
            resource: auth()->user()['email'],
        );

        return $susuboxServices->linkAccount(
            LinkedAccountDTO::toArray(
                customer: $customer,
                request: $request->validated(),
            )
        );
    }
}
