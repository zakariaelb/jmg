<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncomesRequest extends FormRequest
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
                'date' => 'required|max:10',
                'receipt_voucher_number'=> 'required|max:9999|numeric|unique:incomes,receipt_voucher_number',
                'amount' => 'required|numeric|max:9999999',
        ];
    }
    public function messages()
    {
        return [
            'date.required' => __('messages.dateRequired'),
            'receipt_voucher_number.required' => trans('messages.receiptRequired'),
            'receipt_voucher_number.numeric' => __('messages.numericRequired'),
            'receipt_voucher_number.unique' => __('messages.alreadyExists'),
            'amount.required' => __('messages.amountRequired'),
            'amount.numeric' => __('messages.numericRequired'),
        ];
    }
}
