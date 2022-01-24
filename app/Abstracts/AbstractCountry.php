<?php

namespace App\Abstracts;

use App\Contracts\CountryInterface;

/**
 * Description of AbstractCountry
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class AbstractCountry implements CountryInterface
{
    /**
     *
     * @var string The country name
     */
    protected string $name;

    public function getName(): string
    {
        return $this->name ?? $this->name = class_basename(static::class);
    }
}
