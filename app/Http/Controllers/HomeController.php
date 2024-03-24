<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\RequestClient;
use App\Models\Musiclist;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $usertype=Auth()->user()->usertype;

            if($usertype=='client')
            {
                return view('home');
            }
            
            else if($usertype=='admin')
            {
                $user_data = User::all();
                return view('admin.dashboard-admin', compact('user_data'));     

            }

            else
            {
                 return redirect()->back();
            }
        }
    }
    public function orders()
    {
        if(Auth::id())
        {
            $usertype=Auth()->user()->usertype;

            if($usertype=='client')
            {
                $user_id = Auth::id(); 
        $user_history = RequestClient::where('user_id', $user_id)->get();
        $user_buy = Musiclist::where('owner_id', $user_id)->get();
        return view('history', compact('user_history','user_buy'));  
            }
            
            else if($usertype=='admin')
            {
                $user_request = RequestClient::all();
                return view('order', compact('user_request'));     
            }

            else
            {
                 return redirect()->back();
            }
        }
    }
    public function update(Request $request)
{
    $selectedStatus = $request->input('type');

    // Assuming you're updating the status for a specific record
    $recordToUpdate = User::find($request->input('user_id')); // Adjust this query to find the specific record

    if ($recordToUpdate) {
        // Update the 'proccess' column
        $recordToUpdate->proccess = $selectedStatus;
        $recordToUpdate->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    return redirect()->back()->with('fail', 'Record not found.');
}

}