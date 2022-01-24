<?php

namespace App\Entities\Countries;

use App\Abstracts\AbstractCountry;

/**
 * Description of Cameroon
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class Cameroon extends AbstractCountry
{
    /**
     *
     * @inheritDoc
     */
    public const PHONE_CODE = '237';

    public const PHONE_FORMAT = '^\(237\)\ ?[2368]\d{7,8}$';
}
