<?php

namespace App\Services;

use App\Contracts\ListServiceInterface;
use App\Entities\Customer;
use App\Filters\CustomerListFilters;
use App\Repositories\CustomerRepository;

/**
 * Description of CustomerListingService.
 *
 * @author Mohamed Shehata <m.shehata.alex@gmail.com>
 */
class CustomerListingService implements ListServiceInterface
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    /**
     * @var CustomerListFilters
     */
    private $customerFilters;

    /**
     * Create the instance
     *
     * @param CustomerRepository  $customerRepository
     * @param CustomerListFilters $customerFilters
     */
    public function __construct(
        CustomerRepository $customerRepository,
        CustomerListFilters $customerFilters
    ) {
        $this->customerRepository = $customerRepository;
        $this->customerFilters = $customerFilters;
    }

    /**
     * Execute the customer listing functionality
     *
     * @return array<string, \Illuminate\Contracts\Pagination\LengthAwarePaginator>
     */
    public function execute(): array
    {
        
        //apply filters
        $this->applyFilters();

        // we may pass per page or null to get the default defined in repository
        // we select only the phone field from customer
        $customers = $this->customerRepository
                ->paginate(null, ['phone']);

        $customers->getCollection()
            ->transform(function ($item) {
                return new Customer($item);
            });

        return compact('customers');
    }

    /**
     * Apply the filter to customers list request
     *
     * @return void
     */
    private function applyFilters()
    {
        if (count($filters = $this->customerFilters->getFilters())) {
            foreach ($filters as $filter) {
                $this->customerRepository->filter(
                    $filter->getField(),
                    $filter->getValue(),
                    $filter->getOperator()
                );
            }
        }
    }
}
