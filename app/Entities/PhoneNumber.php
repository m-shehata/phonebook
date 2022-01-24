<?php

namespace App\Entities;

use App\Exceptions\PhoneCountryMissing;
use Illuminate\Support\Str;

/**
 * Description of PhoneNumber
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class PhoneNumber
{
    protected const COUNTRY_CODE_PATTERN = '^\(\d{3}\)';

    /**
     *
     * @var string The raw number provided by the user
     */
    private string $rawNumber = '';

    /**
     *
     * @var string The country code part extracted from the raw number
     */
    private string $countryCode = '';

    /**
     *
     * @var string The number part extracted from the raw number
     */
    private string $number = '';

    /**
     * Parses the raw number provided by the user into two parts:
     * First Part is the country code
     * Second Part is the number itself without the country code part
     *
     * @param string $rawNumber The original number
     *
     * @return PhoneNumber
     *
     * @throws PhoneCountryMissing Country code wasn't found in system
     */
    public function parse(string $rawNumber): self
    {
        $this->rawNumber = $rawNumber;
        $this->countryCode = $this->extractCountryCodeFromNumber($rawNumber);
        $this->number = $this->extractPhoneNumberFromNumber($rawNumber);
        return $this;
    }

    /**
     * Get only the number part of the raw number without the country code
     *
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * Get only the country code part of the raw number
     *
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * Get the original raw number
     *
     * @return string
     */
    public function getRawNumber(): string
    {
        return $this->rawNumber;
    }

    /**
     * Get only the country code part of the raw number
     *
     * @return string
     */
    public function getCountryCodeInE164Format(): string
    {
        return '+' . $this->countryCode;
    }

    /**
     * Tries to extract the country code from the provided raw phone number
     * It will return the Country Phone Code as string on success or throw
     * an exception on failure
     *
     * @param string $number
     *
     * @return string
     *
     * @throws PhoneCountryMissing
     */
    private function extractCountryCodeFromNumber(string $number): string
    {
        if (!preg_match('/' . self::COUNTRY_CODE_PATTERN . '/', $number, $matches)) {
            // All exceptions are handled in "app/Exceptions/Handler.php"
            throw new PhoneCountryMissing();
        }
        return str_replace(['(', ')'], '', $matches[0]);
    }

    /**
     * Extract only the phone number part of the raw number
     * without the country code
     *
     * @param string $number
     *
     * @return string
     */
    private function extractPhoneNumberFromNumber(string $number): string
    {
        return trim(Str::after($number, ')'));
    }
}
