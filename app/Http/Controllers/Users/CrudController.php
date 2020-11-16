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
    public function getExpenses(){
           return Expense::get();

    }
}
