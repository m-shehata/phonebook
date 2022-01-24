<?php

namespace Tests\Feature;

use App\Entities\Countries\Cameroon;
use App\Entities\Customer;
use App\Enums\Phone;
use App\Factories\CountryFactory;
use Tests\TestCase;

class CustomerListTest extends TestCase
{
    private string $badCountryCode = 'bad_country_string';
    private string $badPhoneState = 'bad_phone_state_string';

    /**
     * A basic test for customer list page open success.
     *
     * @return void
     */
    public function test_page_open()
    {
        $response = $this->get(route('customers.index'));

        $response->assertStatus(200);
    }

    /**
     * A basic test for customer list page open success.
     *
     * @return void
     */
    public function test_page_open_with_country_param()
    {
        $response = $this->get(route('customers.index', ['country' => Cameroon::PHONE_CODE]));

        $response->assertStatus(200);
    }

    /**
     * A basic test for customer list page open success.
     *
     * @return void
     */
    public function test_page_open_with_state_param()
    {
        $response = $this->get(route('customers.index', ['state' => Phone::VALID]));

        $response->assertStatus(200);
    }

    /**
     * A basic test for customer list page open success.
     *
     * @return void
     */
    public function test_page_open_with_country_and_state_param()
    {
        $response = $this->get(route('customers.index', [
            'country' => Cameroon::PHONE_CODE,
            'state'   => Phone::VALID
        ]));

        $response->assertStatus(200);
    }

    /**
     * A basic test for customer list page redirect on fail.
     *
     * @return void
     */
    public function test_page_redirect_with_wrong_country_param()
    {
        $response = $this->get(route('customers.index', ['country' => $this->badCountryCode]));

        $response->assertStatus(302);
    }

    /**
     * A basic test for customer list page redirect on fail.
     *
     * @return void
     */
    public function test_page_redirect_with_wrong_state_param()
    {
        $response = $this->get(route('customers.index', ['state' => $this->badPhoneState]));

        $response->assertStatus(302);
    }

    /**
     * A basic test for customer list only contain specified country.
     *
     * @return void
     */
    public function test_customer_list_only_contain_selected_country_cameroon()
    {
        $response = $this->get(route('customers.index', ['country' => Cameroon::PHONE_CODE]));
        $data = $response->getOriginalContent()->getData();
        $this->assertTrue($data['customers']
                ->getCollection()
                ->every(function (Customer $customer) {
                    return $customer->getCountryName() == CountryFactory::getCountryInstance(Cameroon::class)->getName();
                }));
    }


    /**
     * A basic test for customer list only contain specified state.
     *
     * @return void
     */
    public function test_customer_list_only_contain_selected_valid_phone_status()
    {
        $response = $this->get(route('customers.index', ['state' => Phone::VALID]));
        $data = $response->getOriginalContent()->getData();
        $this->assertTrue($data['customers']
                ->getCollection()
                ->every(function (Customer $customer) {
                    return $customer->getState() == __('customers.state.' . Phone::VALID);
                }));
    }

    /**
     * A basic test for customer list only contain specified state.
     *
     * @return void
     */
    public function test_customer_list_only_contain_selected_invalid_phone_status()
    {
        $response = $this->get(route('customers.index', ['state' => Phone::INVALID]));
        $data = $response->getOriginalContent()->getData();
        $this->assertTrue($data['customers']
                ->getCollection()
                ->every(function (Customer $customer) {
                    return $customer->getState() == __('customers.state.' . Phone::INVALID);
                }));
    }

}
