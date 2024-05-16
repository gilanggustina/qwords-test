<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkoutForm(Request $request){
        if(!Auth::check()) return redirect()->route('register.index');

        return view("checkout.index");
    }
    public function checkout(Request $request){
        $request->validate([
            'domain_contract' => 'required|numeric|in:1,2,3',
        ]);

        DB::beginTransaction();
        try{
            $invoice = new Invoice();
            $invoice->user_id = Auth::user()->id;
            $invoice->total = 100000;
            $invoice->domain_name = Session::get('domain_name');
            $invoice->save();

            DB::commit();
            if($request["domain_contract"] && Session::get('domain_name')){
                return redirect()->route("invoice.detail",["invoiceId"=>$invoice->id]);
            }else{
                return redirect()->back()->with('error', "Domain tidak tersedia");
            }
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }
}
