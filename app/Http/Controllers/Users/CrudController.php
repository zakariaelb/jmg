<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

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
        Expense::create([
            'amount' => $request->amount,
            'receipt_voucher_number' => $request->receipt_voucher_number,
            'date' => $request->date,
        ]);
        return 'Saved successfully ...';
    }
}
