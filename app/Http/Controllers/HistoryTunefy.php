<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requestclient;
use App\Models\Musiclist;
use Illuminate\Support\Facades\Auth;

class HistoryTunefy extends Controller
{
    public function history()
    {
        $user_id = Auth::id(); 
        $user_history = RequestClient::where('user_id', $user_id)->get();
        $user_buy = Musiclist::where('owner_id', $user_id)->get();
        return view('history', compact('user_history','user_buy'));  
    }
    public function delete(Request $request)
    {
    $iditem = $request->input('item_id');
    $idcard = RequestClient::where('id', $iditem)->get();
    $history = Requestclient::findOrFail($request->input('item_id'));

    $history->delete();

    $user_id = Auth::id(); 
    $user_cart_request = Requestclient::where('user_id',  $user_id)->where('proccess', 'request')->orWhere('proccess', 'demo')->get();  
    return view('cart', compact('user_cart_request'));
}

}
