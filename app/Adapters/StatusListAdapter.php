<?php

namespace App\Adapters;

use App\Contracts\ListServiceInterface;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Description of StatusListAdapter
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class StatusListAdapter implements Arrayable
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
     * List all status text.
     *
     * @return string[]
     */
    public function toArray(): array
    {
        return array_keys($this->adaptee->execute());
    }
}
