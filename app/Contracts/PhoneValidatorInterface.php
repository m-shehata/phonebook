<?php

namespace App\Contracts;

use App\Abstracts\AbstractCountry;

/**
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
interface PhoneValidatorInterface
{
    public function validForCountry(string $phone, AbstractCountry $country): bool;
}
