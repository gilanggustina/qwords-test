<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DomainC extends Controller
{
    public function seacrhDomain(Request $request){
        Validator::extend('valid_domain', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^(?:[-A-Za-z0-9]+\.)+[A-Za-z]{2,6}$/', $value);
        });
        $request->validate([
            'in_name_domain' => 'required|valid_domain',
        ]);

        $response = Http::get('https://portal.qwords.com/apitest/whois.php?domain='.$request["in_name_domain"]);
        $response = json_decode($response->getBody()->getContents());
        if($response->status == "available"){
            Session::put('domain_name', $request["in_name_domain"]);
        }else{
            Session::forget('domain_name');
        }
        return response()->json($response);
    }
}
