<?php

namespace App\Services;

use App\Contracts\ListServiceInterface;

/**
 * Description of StatusListingService.
 *
 * @author Mohamed Shehata <m.shehata.alex@gmail.com>
 */
class StatusListingService implements ListServiceInterface
{
    public function execute(): array
    {
        return __('customers.state');
    }
}
