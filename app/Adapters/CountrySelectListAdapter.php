<?php

namespace App\Adapters;

use App\Contracts\ListServiceInterface;
use App\Factories\CountryFactory;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

/**
 * Description of CountrySelectListAdapter.
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class CountrySelectListAdapter implements Arrayable
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
     * List all countries.
     *
     * @return mixed[]
     */
    public function toArray(): array
    {
        return Collection::make($this->adaptee->execute())
                        ->map(function (string $countryClassName) {
                            return [
                                'label' => CountryFactory::getCountryInstance($countryClassName)->getName(),
                                'value' => $countryClassName::PHONE_CODE,
                            ];
                        })
                        ->toArray();
    }
}
