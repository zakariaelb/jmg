<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserCrudController extends Controller
{
    public function create(){
        //View to add Earning
        return view('incomes.incomes');
    }

    public function store(){

    }
}
