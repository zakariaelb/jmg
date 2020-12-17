<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = "incomes";
    protected $fillable=['id','amount','receipt_voucher_number','created_at','updated_at','date',
                        'sponsor_name_English',
                        'sponsor_name_Arabic',
                        'name_English',
                        'name_Arabic',
                        'service_name_English',
                        'photo',
                        'images',
                        'service_name_Arabic'
                                        ];
    protected $hidden=[];
    public $timestamps = true;
}
