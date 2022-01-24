<?php

namespace App\Http\Controllers;

use App\Adapters\CountrySelectListAdapter;
use App\Adapters\StatusSelectListAdapter;
use App\Http\Requests\CustomerListRequest;
use App\Services\CountryListingService;
use App\Services\CustomerListingService;
use App\Services\StatusListingService;

/**
 * Controller for listing customers paginated with filtering capabilities.
 * First request is validated to contain valid filters. If filters not valid
 * the user will be redirected to listing without filters.
 * Second CustomerListFilters try to capture the filters and provide them in
 * usable format and this may require caching.
 * Third CustomerListingService uses the repository and filters to get
 * appropriate data filtered and paginated.
 *
 * @author Mohamed Shehata <m.shehata.alex@gmail.com>
 */
class CustomerController extends Controller
{
    /**
     * Executing Customer Controller for paginated list with filtering
     *
     * @param CustomerListingService $customerService List all customers phones
     * @param CountryListingService  $countryService  List all countries
     * @param StatusListingService   $statusService   List all status
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function __invoke(
        CustomerListRequest $request,
        CustomerListingService $customerService,
        CountryListingService $countryService,
        StatusListingService $statusService
    ) {
        $data = $customerService->execute();
        $data['countries'] = (new CountrySelectListAdapter($countryService))->toArray();
        $data['states'] = (new StatusSelectListAdapter($statusService))->toArray();

        return view('customers.index', $data);
    }
}
