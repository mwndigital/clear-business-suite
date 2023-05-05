<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionStoreRequest extends FormRequest
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
            'date_time' => ['required'],
            'payment_method' => ['required'],
            'description' => ['required'],
            'amount_in' => ['numeric'],
            'amount_out' => ['numeric'],
            'fees' => ['numeric'],
            'transaction_id' => ['string'],
        ];
    }
}
