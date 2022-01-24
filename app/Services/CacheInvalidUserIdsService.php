<?php

namespace App\Services;

use App\Exceptions\PhoneCountryMissing;
use App\Facades\Phone;
use App\Repositories\CustomerRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

/**
 * Description of CacheInvalidUserIdsService
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class CacheInvalidUserIdsService
{
    /**
     *
     * @var CustomerRepository
     */
    private $customerRepository;
    /**
     *
     * @param CustomerRepository $customerRepository
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Cache the invalid user ids list if not already cached and return the list.
     *
     * @return int[]
     */
    public function execute(): array
    {
        return Cache::remember(
            config('cache.invalid_users.key'),
            config('cache.invalid_users.ttl'),
            $this->getInvalidUserIds()
        );
    }

    /**
     * Callable for retrieving the invalid user ids from the database.
     *
     * @return \Closure
     */
    private function getInvalidUserIds(): \Closure
    {
        return fn () => $this->customerRepository
                        ->all(['id', 'phone'])
                        ->filter(function ($customer) {
                            try {
                                return Phone::isInvalid($customer->phone);
                            } catch (PhoneCountryMissing $exception) {
                                Log::alert(__('exceptions.phone.country_missing', ['phone' => $customer->phone]));
                                return true;
                            }
                        })->pluck('id')
                          ->toArray();
    }
}
