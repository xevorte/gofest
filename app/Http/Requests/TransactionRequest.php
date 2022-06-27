<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'travel_packages_id' => 'required|integer|exists:travel_packages,id',
            'users_id' => 'required|integer|exists:users,id',
            'transaction_code' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone_number' => 'required|integer',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'rooms' => 'required|integer',
            'guests' => 'required|integer',
            'duration' => 'required|integer',
            'type_trip' => 'required|max:255',
            'transaction_total' => 'required|integer',
            'payment_type' => 'required|max:255',
            'transaction_status' => 'required|max:255'
        ];
    }
}
