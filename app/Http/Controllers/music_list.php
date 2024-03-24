<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestClient;
use Illuminate\Support\Facades\DB;
use App\Models\Musiclist;
use Illuminate\Support\Facades\Auth;


class music_list extends Controller
{
    public function list()
    {
                $user_request = Musiclist::all();
                return view('musiclist', compact('user_request'));     

    }

    public function genre(Request $request)
    {
        $noowner = null;
        $list_music = Musiclist::where('owner_id', $noowner)->get();
        $genreType = $request->query('type');

        // Render the page based on the genre type
        // You can use switch or if-else to handle different genre types
        switch ($genreType) {
            case 'hiphop':
                return view('genre.hiphop',  compact('list_music'));
                break;
            case 'rap':
                return view('genre.rap',  compact('list_music'));
                break;
            case 'lofi':
                return view('genre.lofi',  compact('list_music'));
                break;
            case 'piano':
                return view('genre.piano',  compact('list_music'));
                break;
            case 'orchestra':
                return view('genre.orchestra',  compact('list_music'));
                break;
            case 'electrohouse':
                return view('genre.electrohouse',  compact('list_music'));
                break;
            case 'tropicalhouse':
                return view('genre.tropicalhouse',  compact('list_music'));
                break;
            case 'futurebass':
                return view('genre.futurebass',  compact('list_music'));
                break;
            case 'tropicalhouse':
                return view('genre.tropicalhouse',  compact('list_music'));
                break;
            case 'trap':
                return view('genre.trap',  compact('list_music'));
                break;
            case 'melodicdubstep':
                return view('genre.melodicdubstep',  compact('list_music'));
                break;
            case 'dnb':
                return view('genre.dnb',  compact('list_music'));
                break;
            default:
                return redirect('/home');
                break;
        }
    }
    function add(Request $request)
    {
        ($request->all());
           $request->validate([
            'img' => 'nullable',
            'audio' => 'nullable',
            'title' => 'nullable',
            'time' => 'nullable',
            'genre' => 'required',
            'link' => 'nullable',
            'price' => 'nullable',
        ]);
    

        if ($request->hasFile('audio')) {
            $audioFileName = time() . '_' . $request->file('audio')->getClientOriginalName();
            $request->file('audio')->move(public_path('music'), $audioFileName);
            $musicUrl = '/music/' . $audioFileName;
        } else {
            // Handle case when audio file is not provided
            return back()->with('fail', 'Audio file is required');
        }
        if ($request->hasFile('img')) {
            $fileName = time() . '_' . $request->file('img')->getClientOriginalName();
            $request->file('img')->move(public_path('img'), $fileName);
            $imgPath = './img/' . $fileName;
            } else  {
            $paymentPath = null; // Atau berikan nilai default sesuai kebutuhan Anda
            }
    
    
        $query = DB::table('music_list')->insert([
            'img' => $imgPath,
            'genre' => $request->input('genre'),
            'title' => $request->input('title'),
            'audio' => $musicUrl,
            'time' => $request->input('time'),
            'link' => $request->input('link'),
            'price' => $request->input('price'),
        ]);
    
        if($query){
            return redirect()->route('dashboard')->with('success', 'Data has been inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
        
    }

    public function receipt(Request $request)
    {
        $iditem = $request->input('title');
        $idcard = Musiclist::where('title', $iditem)->get();
        return view('musicorder',  compact('idcard'));
    }
    
    public function update(Request $request)
{
    $user_id = Auth::id();
    $proccess = $request->input('proccess');
    $price = $request->input('price');
    
    if ($proccess == 'demo') {
        $proccessing = 'ordered';
    }

    if ($request->hasFile('pay')) {
        $fileName = time() . '_' . $request->file('pay')->getClientOriginalName();
        $request->file('pay')->move(public_path('musicpay'), $fileName);
        $imgPath = './musicpay/' . $fileName;

    $recordToUpdate = Musiclist::find($request->input('iditem')); 

    if ($recordToUpdate) {
        $recordToUpdate->owner_id = $user_id;
        $recordToUpdate->proccess = $proccessing;
        $recordToUpdate->price = $price;
        $recordToUpdate->payment = $imgPath;
        $recordToUpdate->save();
 
        $user_id = Auth::id(); 
    $user_cart_request = Requestclient::where('user_id',  $user_id)->where('proccess', 'request')->orWhere('proccess', 'demo')->get();  
    return view('cart', compact('user_cart_request'));
    } else {
    return view('home');

    }
}
}}