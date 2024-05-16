<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function form(Request $request){
        return view("auth.register");
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
        DB::beginTransaction();
        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
    
            if($request["domain_contract"]){
                $invoice = new Invoice();
                $invoice->user_id = $user->id;
                $invoice->total = 100000;
                $invoice->domain_name = Session::get('domain_name');
                $invoice->save();
            }

            $credentials = $request->only('email', 'password');
            Auth::attempt($credentials);
            $request->session()->regenerate();
            DB::commit();
            if($request["domain_contract"] && Session::get('domain_name')){
                Session::forget('domain_name');
                return redirect()->route("invoice.detail",["invoiceId"=>$invoice->id]);
            }else{
                return redirect()->route('main');
            }

        }catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
