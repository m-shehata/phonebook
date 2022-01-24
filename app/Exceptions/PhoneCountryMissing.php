<?php

namespace App\Exceptions;

use Exception;

class PhoneCountryMissing extends Exception
{
    protected $message = 'Country code can\'t be found in the provided  phone number.';
}
