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
        $task;
        if ($request->has('search')){
            $task = task::where('name','LIKE','%'.$request.'%')->get();
        }
        else{
            $task = task::all();
        }
        if (Auth::user()->role == 1){
            return view('home',['task'=>$task->where('user_id', '=', Auth::user()->id)->paginate(15)]);
        }
        else return view('admin',['task'=>$task->where('user_id', '!=', null)->paginate(15)]);

        return view('/home');
    }
    
}
