<?php

namespace App\Entities;

use App\Exceptions\PhoneCountryMissing;
use App\Models\Customer as CustomerModel;
use App\Services\CountrySearchService;
use App\Services\PhoneNumberValidator;

/**
 * Description of Customer
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class Customer
{
    /**
     * The customer phone
     *
     * @var string
     */
    private string $phone = '';

    /**
     * The customer phone status
     *
     * @var string
     */
    private string $state = '';

    /**
     * The customer country name
     *
     * @var string
     */
    private string $countryName = '';

    /**
     * The customer country code
     *
     * @var string
     */
    private string $countryCode = '';

    /**
     * Creates the customer entity instance
     * 
     * @param CustomerModel $customer
     */
    public function __construct(CustomerModel $customer)
    {
        $this->fillCustomerData($customer);
    }

    /**
     * Get the customer phone
     *
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * Get the customer phone state
     *
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * Get the customer country name depending on phone
     *
     * @return string
     */
    public function getCountryName(): string
    {
        return $this->countryName;
    }

    /**
     * Get the customer country code depending on phone
     *
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     *
     * @param CustomerModel $customer
     */
    private function fillCustomerData(CustomerModel $customer)
    {
        try {
            $phone = (new PhoneNumber())->parse($customer->phone);
            $country = CountrySearchService::getCountryByPhoneCode($phone->getCountryCode());

            $this->phone = $phone->getNumber();
            $this->countryCode = $phone->getCountryCodeInE164Format();
            $this->countryName = $country->getName();
            $this->state = (new PhoneNumberValidator())->validForCountry($customer->phone, $country) ?
                    __('customers.state.valid') :
                    __('customers.state.invalid');
        } catch (PhoneCountryMissing $exception) {
            Log::alert(__('exceptions.phone.country_missing', ['phone' => $customer->phone]));
        }
    }
}
