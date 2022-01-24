<?php

namespace App\Enums;


/**
 * Description of Country
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class Country
{
    public const COUNTRIES = [
        \App\Entities\Countries\Cameroon::class,
        \App\Entities\Countries\Ethiopia::class,
        \App\Entities\Countries\Morocco::class,
        \App\Entities\Countries\Mozambique::class,
        \App\Entities\Countries\Uganda::class,
    ];
}
