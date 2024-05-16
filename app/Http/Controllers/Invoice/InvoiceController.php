<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceController extends Controller
{
    public function detail(Request $request){
        $invoice = Invoice::where("user_id",Auth::user()->id)->find($request['invoiceId']);
        return view('invoice.detail',compact('invoice'));
    }

    public function export(Request $request){
        $invoice = Invoice::with("user")->find($request['invoiceId']);

        $pdf = Pdf::loadView('invoice.export', compact('invoice'))->setPaper(array(0,0,400,400));
        $fileName = "Invoice (".str_pad($invoice->id, 7, '0', STR_PAD_LEFT).").pdf";
        return $pdf->download($fileName);

    }
}
