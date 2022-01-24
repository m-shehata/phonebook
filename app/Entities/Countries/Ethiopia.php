<?php

namespace App\Entities\Countries;

use App\Abstracts\AbstractCountry;

/**
 * Description of Cameroon
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class Ethiopia extends AbstractCountry
{
    /**
     *
     * @inheritDoc
     */
    public const PHONE_CODE = '251';
    public const PHONE_FORMAT = '^\(251\)\ ?[1-59]\d{8}$';
}
