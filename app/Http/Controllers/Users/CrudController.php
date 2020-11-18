<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    //
    public function __construct()
    {

    }

    public function getExpenses()
    {
        return Expense::get();
    }

    public function store()
    {
        Expense::create([
            'amount' => '0000',
            'receipt_voucher_number' => '0000',
            'date' => '2020-11-16',
        ]);
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function save(Request $request)
    {
        //Validator

        $rules = $this -> getRules();
        $messages = $this -> getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);

            if($validator ->fails()){
                //return $validator->errors()->first();
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
        //Insert
        Expense::create([
            'amount' => $request->amount,
            'receipt_voucher_number' => $request->receipt_voucher_number,
            'date' => $request->date,
        ]);
        //return redirect()->back()->withErrors($validator)->withInput($request->all());
    }

    protected function getRules(){
        return $rules = [
            'date' => 'required|max:10',
            'receipt_voucher_number'=> 'required|max:6|numeric|unique:expenses,receipt_voucher_number',
            'amount' => 'required|numeric|max:7',
        ];
    }
    protected function getMessages(){
        return $messages = [
            'date.required' => __('messages.dateRequired'),
            'receipt_voucher_number.required' => __('messages.receiptRequired'),
            'receipt_voucher_number.numeric' => __('messages.numericRequired'),
            'receipt_voucher_number.unique' => __('messages.alreadyExists'),
            'amount.required' => __('messages.amountRequired'),
            'amount.numeric' => __('messages.numericRequired'),
    ];
    }
}
