<?php

namespace App\Entities\Countries;

use App\Abstracts\AbstractCountry;

/**
 * Description of Cameroon
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class Morocco extends AbstractCountry
{
    /**
     *
     * @inheritDoc
     */
    public const PHONE_CODE = '212';

    public const PHONE_FORMAT = '^\(212\)\ ?[5-9]\d{8}$';
}
