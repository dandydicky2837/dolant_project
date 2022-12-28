<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
       
        if ($request->has('search')){
            if (Auth::user()->role == 1){
            return view('home',['task'=>task::where('name','LIKE','%'.$request['search'].'%')->where('name', '=', Auth::user()->id)->paginate(15)]);
        }
        else return view('admin',['task'=>task::where('name','LIKE','%'.$request['search'].'%')->paginate(15)]);
        }
        else{
           if (Auth::user()->role == 1){
            return view('home',['task'=>task::where('name', '=', Auth::user()->id)->paginate(15)]);
        }
        else return view('admin',['task'=>task::paginate(15)]);

        }
        
        return view('/home');
    }
    
}
