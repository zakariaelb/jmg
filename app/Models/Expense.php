<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = "expenses";
    protected $fillable=['amount','receipt_voucher_number','created_at','updated_at','date'];
    protected $hidden=[];

}
