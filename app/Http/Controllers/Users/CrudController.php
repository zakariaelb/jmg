<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\inputRequest;
use App\Http\Requests\updatingRequest;
use App\Models\Expense;
use App\Traits\ExpensesTrait;
use App\Traits\ExpesnesTraitMultiple;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use function Symfony\Component\String\s;

class CrudController extends Controller
{
    use ExpensesTrait;
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

    public function save(inputRequest $request)
    {
        //Validator
        /**$rules = $this -> getRules();
        //$messages = $this -> getMessages();
        //$validator = Validator::make($request->all(),$rules,$messages);
          ////    //return $validator->errors()->first();
              //  return redirect()->back()->withErrors($validator)->withInput($request->all());
          //  }**/

        $file_name =$this -> saveImage($request -> photo ,'Images/Expenses');
        //store(request $request);
        //Insert

        Expense::create([
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
            'service_name_Arabic'=> $request->service_name_Arabic
        ]);

        return redirect()->back()->with(['success' =>'OKAY']);

        //return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
/*
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
            'receipt_voucher_number.required' => trans('messages.receiptRequired'),
            'receipt_voucher_number.numeric' => __('messages.numericRequired'),
            'receipt_voucher_number.unique' => __('messages.alreadyExists'),
            'amount.required' => __('messages.amountRequired'),
            'amount.numeric' => __('messages.numericRequired'),
    ];
    }
*/
            public function allExpenses(){
            $expenses = Expense::select('id','amount',
                'photo',
                'receipt_voucher_number',
                'created_at',
                'updated_at',
                'date',
                'sponsor_name_en',
                'sponsor_name_ar',
                'name_en',
                'name_ar',
                'service_name_en',
                'service_name_ar') -> get();
            return view('expenses.allExpenses',compact('expenses'));
            }
    public function getAllExpenses(){
        $expenses = Expense::select('id','amount',
            'photo',
            'receipt_voucher_number',
            'created_at',
            'updated_at',
            'date',
            'sponsor_name_'.LaravelLocalization::getCurrentLocaleName() . ' as sponsor_name',
            'name_'.LaravelLocalization::getCurrentLocaleName() . ' as name',
            'service_name_'.LaravelLocalization::getCurrentLocaleName() . ' as service_name') -> get();
        return view('expenses.allExpenses',compact('expenses'));
    }
    public function editExpenses($id_Expenses)  {
                //Jmgexpense::findOrFail($id_Expenses);
        $id_Exp =  Expense::find($id_Expenses);
        if(!$id_Exp)
        return redirect() -> back() ;

        $id_Exp = Expense::select('id',
            'amount',
            'receipt_voucher_number',
            'created_at',
            'updated_at',
            'date',
            'sponsor_name_English',
            'sponsor_name_Arabic',
            'name_English',
            'name_Arabic',
            'service_name_English',
            'service_name_Arabic')-> find($id_Expenses);
        return view('expenses.edit',compact('id_Exp'));
    }
    public function update(updatingRequest $request, $id_Expenses){
                //Validation ::

        //Check if record exist

        $id_Exp  = Expense::select('id',
            'amount',
            'receipt_voucher_number',
            'created_at',
            'updated_at',
            'date',
            'sponsor_name_English',
            'sponsor_name_Arabic',
            'name_English',
            'name_Arabic',
            'service_name_English',
            'service_name_Arabic')-> find($id_Expenses);
        if(!$id_Exp)

            return redirect() ->back();

        //Update :
        //$id_Exp -> update($request -> all();

        $id_Exp -> update([
        'amount' => $request->amount,
        //'receipt_voucher_number' => $request->receipt_voucher_number,
        'date' => $request->date,
        'sponsor_name_English'=> $request->sponsor_name_English,
        'sponsor_name_Arabic'=> $request->sponsor_name_Arabic,
        'name_English'=> $request->name_English,
        'name_Arabic'=> $request->name_Arabic,
        'service_name_English'=> $request->service_name_English,
        'service_name_Arabic'=> $request->service_name_Arabic]);

            return redirect() ->back() -> with(['success' => 'Okay UPDATE']);
        }
        public function delete($id_Expenses){
        //Check if exists
            $Expense = Expense::find($id_Expenses);
            if (!$Expense)
                return redirect()->back() -> with(['error'=> __('messages.Not exist')]);

            $Expense -> delete();

            return redirect()
                ->route('expense.all')
                ->with(['success' => __('messages.delete OK')]);
        }
}
