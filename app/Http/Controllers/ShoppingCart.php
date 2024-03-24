<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestClient;
use App\Models\Musiclist;
use Illuminate\Support\Facades\Auth;

class ShoppingCart extends Controller
{
    public function cart()
    {
    $user_id = Auth::id(); 
    $user_cart_request = Requestclient::where('user_id',  $user_id)->where('proccess', 'request')->orWhere('proccess', 'demo')->get();  
    return view('cart', compact('user_cart_request'));
    }  

    public function receipt(Request $request)
    {
        $iditem = $request->input('item_id');
        $idcard = RequestClient::where('id', $iditem)->get();
        return view('receipt',  compact('idcard'));
    }

    public function update(Request $request)
{
    $user_id = Auth::id();
    $proccess = $request->input('proccess');
    $price = $request->input('price');
    $pricing = 0;

    if ($proccess == 'request') {
        $proccessing = 'processing';
    }
        elseif ($proccess == 'demo') {
        $proccessing = 'done';
        }

    if ($price == '10.000') {
        $pricing = '140.000';
    }
        elseif ($price == '20.000') {
        $pricing = '155.000';
        }
        elseif ($price == '30.000') {
        $pricing = '170.000';
    }
    else{
        $pricing = $price;
    }

    if ($request->hasFile('pay')) {
        $fileName = time() . '_' . $request->file('pay')->getClientOriginalName();
        $request->file('pay')->move(public_path('payment'), $fileName);
        $imgPath = './payment/' . $fileName;

    $recordToUpdate = RequestClient::find($request->input('iditem')); 

    if ($recordToUpdate) {
        $recordToUpdate->proccess = $proccessing;
        $recordToUpdate->price = $pricing;
        $recordToUpdate->first_payment = $imgPath;
        $recordToUpdate->save();

        $user_id = Auth::id(); 
        $user_cart_request = Requestclient::where('user_id',  $user_id)->where('proccess', 'request')->get();  
        return view('cart', compact('user_cart_request'));
    }
    
    $user_id = Auth::id(); 
    $user_cart_request = Requestclient::where('user_id',  $user_id)->where('proccess', 'request')->get();  
    return view('cart', compact('user_cart_request'));

}
}
}