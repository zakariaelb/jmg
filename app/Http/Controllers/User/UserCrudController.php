<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncomesRequest;
use App\Models\Expense;
use App\Models\Income;
use App\Traits\ExpensesTrait;
use Illuminate\Http\Request;
use LaravelLocalization;


class UserCrudController extends Controller
{
    use ExpensesTrait;

    public function create(){
        //View to add Earning
        return view('incomes.incomes');
    }

    public function store(IncomesRequest $request)
    {
        //Validator
        /**$rules = $this -> getRules();
        //$messages = $this -> getMessages();
        //$validator = Validator::make($request->all(),$rules,$messages);
        ////    //return $validator->errors()->first();
        //  return redirect()->back()->withErrors($validator)->withInput($request->all());
        //  }**/

        $file_name =$this -> saveImage($request -> photo ,'Images/Incomes');
        //store(request $request);
        //Insert

        $incomes = Income::create([
            //'images'=>  implode("|",$images),
            'photo' => $file_name,
            'amount' => $request->amount,
            'receipt_voucher_number' => $request->receipt_voucher_number,
            'date' => $request->date,
            'sponsor_name_English'=> $request->sponsor_name_English,
            'sponsor_name_Arabic'=> $request->sponsor_name_Arabic,
            'name_English'=> $request->name_English,
            'name_Arabic'=> $request->name_Arabic,
            'service_name_English'=> $request->service_name_English,
            'service_name_Arabic'=> $request->service_name_Arabic,
        ]);
        if($incomes)
        return response() -> json([
            'status' => true,
            'msg' => 'Saved',
        ]); else
            return response() -> json([
                            'status' => false,
                            'msg' => 'Failed',
            ]);
        //return redirect()->back()->with(['success' =>'OKAY']);

        //return redirect()->back()->withErrors($validator)->withInput($request->all());
    }

    public function getAllIncomes(){
            $incomes = Income::select('id','amount',
                'photo',
                'receipt_voucher_number',
                'created_at',
                'updated_at',
                'date',
                'sponsor_name_'. \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleName() . ' as sponsor_name',
                'name_'.LaravelLocalization::getCurrentLocaleName() . ' as name',
                'service_name_'.LaravelLocalization::getCurrentLocaleName() . ' as service_name') -> get();

            return view('incomes.incomesall',compact('incomes'));
        }

    public function delete(Request $request){
        //Check if exists
        $Incomes = Income::find($request -> id);
        if (!$Incomes)
            return redirect()->back() -> with(['error'=> __('messages.Not exist')]);

        $Incomes -> delete();
        return response() -> json([
            'status' => true,
            'msg' => 'Deleted',
            'id' => $request -> id
        ]);
    }
}
