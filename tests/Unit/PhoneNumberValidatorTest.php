<?php

namespace Tests\Unit;

use App\Entities\Countries\Cameroon;
use App\Entities\Countries\Ethiopia;
use App\Entities\Countries\Morocco;
use App\Entities\Countries\Mozambique;
use App\Entities\Countries\Uganda;
use App\Services\PhoneNumberValidator;
use PHPUnit\Framework\TestCase;

class PhoneNumberValidatorTest extends TestCase
{
    private $goodCameroonPhone = '(237) 697151594';
    private $badCameroonPhone = '697151594';

    private $goodEthiopiaPhone = '(251) 911168450';
    private $badEthiopiaPhone = '911168450';

    private $goodMoroccoPhone = '(212) 698054317';
    private $badMoroccoPhone = '698054317';

    private $goodMozambiquePhone = '(258) 848826725';
    private $badMozambiquePhone = '848826725';

    private $goodUgandaPhone = '(256) 714660221';
    private $badUgandaPhone = '714660221';

    /**
     * Testing Cameroon phone number format regex validity
     *
     * @return void
     */
    public function test_valid_phone_for_country_cameroon()
    {
        $validator = new PhoneNumberValidator();
        $this->assertTrue($validator->validForCountry($this->goodCameroonPhone, new Cameroon()));
        $this->assertFalse($validator->validForCountry($this->badCameroonPhone, new Cameroon()));
    }

    /**
     * Testing Ethiopia phone number format regex validity
     *
     * @return void
     */
    public function test_valid_phone_for_country_ethiopia()
    {
        $validator = new PhoneNumberValidator();
        $this->assertTrue($validator->validForCountry($this->goodEthiopiaPhone, new Ethiopia()));
        $this->assertFalse($validator->validForCountry($this->badEthiopiaPhone, new Ethiopia()));
    }

    /**
     * Testing Morocco phone number format regex validity
     *
     * @return void
     */
    public function test_valid_phone_for_country_morocco()
    {
        $validator = new PhoneNumberValidator();
        $this->assertTrue($validator->validForCountry($this->goodMoroccoPhone, new Morocco()));
        $this->assertFalse($validator->validForCountry($this->badMoroccoPhone, new Morocco()));
    }

    /**
     * Testing Mozambique phone number format regex validity
     *
     * @return void
     */
    public function test_valid_phone_for_country_mozambique()
    {
        $validator = new PhoneNumberValidator();
        $this->assertTrue($validator->validForCountry($this->goodMozambiquePhone, new Mozambique()));
        $this->assertFalse($validator->validForCountry($this->badMozambiquePhone, new Mozambique()));
    }

    /**
     * Testing Uganda phone number format regex validity
     *
     * @return void
     */
    public function test_valid_phone_for_country_uganda()
    {
        $validator = new PhoneNumberValidator();
        $this->assertTrue($validator->validForCountry($this->goodUgandaPhone, new Uganda()));
    }

    /**
     * Testing Uganda phone number format regex validity
     *
     * @return void
     */
    public function test_invalid_phone_for_country_uganda()
    {
        $validator = new PhoneNumberValidator();
        $this->assertFalse($validator->validForCountry($this->badUgandaPhone, new Uganda()));
    }
}
