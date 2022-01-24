<?php

namespace App\Services;

use App\Contracts\ListServiceInterface;
use App\Enums\Country;

/**
 * Description of CountryListingService.
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class CountryListingService implements ListServiceInterface
{
    /**
     * List country names
     *
     * @return string[]
     */
    public function execute(): array
    {
        return Country::COUNTRIES;
    }
}
