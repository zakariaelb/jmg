<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    //
    public function Admin(){

        return view('admin.index');
    }
    public function user(){
        return view('.admin.user.index');
    }
}
