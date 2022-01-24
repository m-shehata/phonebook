<?php

namespace App\Contracts;

/**
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */

interface CountryInterface
{
    public const PHONE_CODE = '';

    public const PHONE_FORMAT = '';

    public function getName(): string;
}
