<?php

namespace App\Filters;

use App\Entities\FilterEntity;
use App\Enums\Phone;
use App\Services\CacheInvalidUserIdsService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;

/**
 * Capture the customer list filters an return them in usable format.
 * Some filters may require caching / read from cache which is done
 * only if these filters exist in the request.
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class CustomerListFilters
{
    /**
     *
     * @var string|null
     */
    private $phone;

    /**
     *
     * @var string|null
     */
    private $state;

    public function __construct()
    {
        $this->setFilters();
    }

    /**
     * Set the filters data
     */
    public function setFilters()
    {
        $this->phone = Request::get('country');
        $this->state = Request::get('state');
    }

    /**
     * Get filter as list of FilterEntity
     *
     * @return FilterEntity[]
     */
    public function getFilters(): array
    {
        $filters = [];

        // if we have phone filter active we add the appropriate filteration
        if ($this->phone) {
            $filters[] = $this->getPhoneFilter();
        }

        // if we have state filter active we add the appropriate filteration
        if ($this->state) {
            $filters[] = $this->getStateFilter();
        }

        return $filters;
    }

    /**
     * Get the phone filter
     *
     * @return FilterEntity
     */
    private function getPhoneFilter(): FilterEntity
    {
        return new FilterEntity('phone', "($this->phone)%", 'LIKE');
    }

    /**
     * Get the state filter
     *
     * @return FilterEntity
     */
    private function getStateFilter(): FilterEntity
    {
        // we only cache / read from cache if we have active state filter
        $invalidIds = App::make(CacheInvalidUserIdsService::class)->execute();

        return new FilterEntity('id', $invalidIds, Phone::INVALID == $this->state ? 'IN' : 'NOTIN');
    }
}
