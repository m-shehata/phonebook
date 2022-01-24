<?php

namespace App\Services;

use App\Contracts\CountryInterface;
use App\Contracts\PhoneValidatorInterface;

/**
 * Description of PhoneNumberValidator
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class PhoneNumberValidator implements PhoneValidatorInterface
{
    public function validForCountry(string $phone, CountryInterface $country): bool
    {
        return (bool) preg_match('/' . $country::PHONE_FORMAT . '/', $phone);
    }
}
