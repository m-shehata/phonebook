<?php

namespace App\Facades;

use App\Entities\PhoneNumber;
use App\Exceptions\PhoneCountryMissing;
use App\Services\CountrySearchService;
use App\Services\PhoneNumberValidator;

/**
 * Description of Phone
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class Phone
{
    /**
     * Check if the provided phone is in valid format according to it's
     * country code existed in the phone prefix
     *
     * @param string $phoneNumber
     *
     * @return bool
     *
     * @throws PhoneCountryMissing
     */
    public static function isValid(string $phoneNumber): bool
    {
        $phone = (new PhoneNumber())->parse($phoneNumber);
        $country = CountrySearchService::getCountryByPhoneCode($phone->getCountryCode());
        return (new PhoneNumberValidator())->validForCountry($phone->getRawNumber(), $country);
    }

    /**
     * Check if the provided phone not in valid format according to it's
     * country code existed in the phone prefix
     *
     * @param string $phoneNumber
     *
     * @return bool
     *
     * @throws PhoneCountryMissing
     */
    public static function isInvalid(string $phoneNumber): bool
    {
        return !static::isValid($phoneNumber);
    }
}
