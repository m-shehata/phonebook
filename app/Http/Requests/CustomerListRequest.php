<?php

namespace App\Http\Requests;

use App\Adapters\CountryCodeListAdapter;
use App\Adapters\StatusListAdapter;
use App\Services\CountryListingService;
use App\Services\StatusListingService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerListRequest extends FormRequest
{
    protected $redirectRoute = 'customers.index';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(CountryListingService $coutryList, StatusListingService $statusList)
    {
        return [
            'country' => ['nullable', 'string', Rule::in((new CountryCodeListAdapter($coutryList))->toArray())],
            'state' => ['nullable', 'string', Rule::in((new StatusListAdapter($statusList))->toArray())],
        ];
    }
}
