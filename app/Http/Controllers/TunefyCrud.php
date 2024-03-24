<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestClient;
use App\Models\User;
class TunefyCrud extends Controller
{

    function dashboard(){
        return view('dashboard');
    }
    function add(Request $request){

    $request->validate([
        'email' => 'nullable',
        'first_name' => 'nullable',
        'last_name' => 'nullable',
        'bpm' => 'required',
        'genre' => 'required',
        'instrument' => 'nullable',
        'chord' => 'nullable',
        'audio' => 'nullable', // Assuming audio is required
        'company' => 'nullable', // Assuming payment is required
        'price' => 'required'
    ]);

    $user_id = Auth::id();
    $user_email = Auth::user()->email; // Get user email directly from Auth
    $user_name = Auth::user()->name; // Get user name directly from Auth

    // Handle audio file upload
    if ($request->hasFile('audio')) {
        $audioFileName = time() . '_' . $request->file('audio')->getClientOriginalName();
        $request->file('audio')->move(public_path('audio'), $audioFileName);
        $audioUrl = '/audio/' . $audioFileName;
    } else {
        $audioUrl = 'null';
    }


    // Insert data into the database
    $query = DB::table('user_request')->insert([
        'user_id' => $user_id,
        'email' => $user_email,
        'name' => $user_name,  
        'bpm' => $request->input('bpm'),
        'genre' => $request->input('genre'),
        'instrument' => $request->input('instrument'),
        'chord' => $request->input('chord'),
        'audio' => $audioUrl,
        'notes' => $request->input('notes'),
        'price' => $request->input('price'),
    ]);

    if($query){
        $user_id = Auth::id(); 
        $user_cart_request = Requestclient::where('user_id',  $user_id)->where('proccess', 'request')->orWhere('proccess', 'demo')->get();  
        return view('cart', compact('user_cart_request'))->with('success', 'Data has been inserted');
    } else {
        return back()->with('fail', 'Something went wrong');
    }
    
}
public function update(Request $request)
{
    $selectedStatus = $request->input('status');
    $link = $request->input('link');
    // Assuming you're updating the status for a specific record
    $recordToUpdate = RequestClient::find($request->input('record_id')); // Adjust this query to find the specific record

    if ($recordToUpdate) {
        $recordToUpdate->link = $link;
        $recordToUpdate->proccess = $selectedStatus;
        $recordToUpdate->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    return redirect()->back()->with('fail', 'Record not found.');
}


}
