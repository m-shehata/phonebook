<?php

namespace App\Entities\Countries;

use App\Abstracts\AbstractCountry;

/**
 * Description of Cameroon
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class Mozambique extends AbstractCountry
{
    /**
     *
     * @inheritDoc
     */
    public const PHONE_CODE = '258';
    public const PHONE_FORMAT = '^\(258\)\ ?[28]\d{7,8}$';
}
