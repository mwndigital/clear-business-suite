<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
            'company_name' => ['max:255'],
            'default_language' => ['max:255'],
            'address_line_one' => ['required', 'max:255'],
            'address_line_two' => ['max:255'],
            'town_city' => ['required', 'max:255'],
            'state_region' => ['required', 'max:255'],
            'zip_postcode' => ['required', 'max:50'],
            'country' => ['required'],
            'phone_number' => ['max:255'],
            'default_payment_method' => ['max:255'],
            'default_currency' => ['max:255'],
            'default_currency_symbol' => ['max: 10'],
            'website' => ['max:255']
        ];
    }
}
