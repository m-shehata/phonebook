<?php

namespace App\Adapters;

use App\Contracts\ListServiceInterface;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

/**
 * Description of StatusSelectListAdapter.
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class StatusSelectListAdapter implements Arrayable
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
                        ->map(function (string $label, string $key) {
                            return [
                                'label' => $label,
                                'value' => $key,
                            ];
                        })
                        ->toArray();
    }
}
