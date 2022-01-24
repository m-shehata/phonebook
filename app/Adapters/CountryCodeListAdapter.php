<?php

namespace App\Adapters;

use App\Contracts\ListServiceInterface;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

/**
 * Description of CountryCodeListAdapter
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class CountryCodeListAdapter implements Arrayable
{
    /**
     * @var ListServiceInterface
     */
    private $adaptee;

    public function __construct(ListServiceInterface $service)
    {
        $this->adaptee = $service;
    }

    /**
     * List all countries code.
     *
     * @return string[]
     */
    public function toArray(): array
    {
        return Collection::make($this->adaptee->execute())
                        ->map(function (string $countryClassName) {
                            return $countryClassName::PHONE_CODE;
                        })
                        ->toArray();
    }
}
