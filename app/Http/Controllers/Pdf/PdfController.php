<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Http\Requests\inputRequest;
use App\Http\Requests\updatingRequest;
use App\Models\Expense;
use App\Models\Income;
use App\Traits\ExpensesTrait;
use App\Traits\ExpesnesTraitMultiple;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Mpdf\Mpdf;
use function Symfony\Component\String\s;
class PdfController extends Controller
{
    function gen()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<input type="Date" name="date" STYLE="display: none" class="form-control" value="{{$id_Inc -> date}}" id="dateID" placeholder="date">');
        return $pdf -> stream();
    }

    public function generate()
    {
        $data = Income::take(1) -> get();
        //$data = Income::latest('id')->first();
     //return view('pdf.invoice', compact('data'));
     $fileName = 'Invoice.pdf'
         $mpdf = new \Mpdf\Mpdf([
             'margin_left' => 10,
             'margin_right' => 10,
             'margin_top' => 15,
             'margin_bottom' => 20,
             'margin_header' => 10,
             'margin_footer' => 10,
         ]);
     $html = \View::make('pdf.invoice')->with('data', $data);
     $html = $html->render();
     $mpdf -> setHeader('Invoice');
     $mpdf -> setFooter('Invoice');
     $stylesheet = file_get_contents(url('/css/mpdf.css'));
     $mpdf->WriteHTML($stylesheet, 1);
     $mpdf->writeHTML($html);
     $mpdf->Outout($fileName, 'I');

    }
}
