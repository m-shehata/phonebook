<?php

namespace App\Factories;

use App\Contracts\CountryInterface;

/**
 * Description of CountryFactory.
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class CountryFactory
{
    /**
     * Get the required country instance. Hiding class initialization complexity.
     *
     * @param string $countryClassName
     *
     * @return CountryInterface
     */
    public static function getCountryInstance(string $countryClassName): CountryInterface
    {
        return new $countryClassName();
    }
}
