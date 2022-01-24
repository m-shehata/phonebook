<?php

namespace App\Entities\Countries;

use App\Abstracts\AbstractCountry;

/**
 * Description of Cameroon
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class Uganda extends AbstractCountry
{
    /**
     *
     * @inheritDoc
     */
    public const PHONE_CODE = '256';

    public const PHONE_FORMAT = '^\(256\)\ ?\d{9}$';
}
