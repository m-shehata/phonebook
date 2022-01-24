<?php

namespace App\Services;

use App\Contracts\CountryInterface;
use App\Enums\Country;
use App\Factories\CountryFactory;
use Illuminate\Support\Collection;

/**
 * Description of CountrySearchService
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class CountrySearchService
{
    /**
     * Get specific country by it's phone code.
     *
     * @param string $phoneCode
     *
     * @return CountryInterface
     */
    public static function getCountryByPhoneCode(string $phoneCode): CountryInterface
    {
        $className = Collection::make(Country::COUNTRIES)
                ->first(function (string $countryClassName) use ($phoneCode) {
                    return $countryClassName::PHONE_CODE === $phoneCode;
                });

        return CountryFactory::getCountryInstance($className);
    }
}
