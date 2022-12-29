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

        if ($request->has('search')) {
            if (Auth::user()->role == 1) {
                return view('home', ['task' => task::where('user_id', '=', Auth::user()->id)
                    ->where('jenis_pekerjaan', 'LIKE', '%' . $request['search'] . '%')
                    ->orWhere('nama_channel', 'LIKE', '%' . $request['search'] . '%')
                    ->orWhere('judul_seri', 'LIKE', '%' . $request['search'] . '%')
                    ->orWhere('keterangan_kerja', 'LIKE', '%' . $request['search'] . '%')
                    ->orWhere('link', 'LIKE', '%' . $request['search'] . '%')->paginate(15)]);
            } else return view('admin', ['task' => task::where('jenis_pekerjaan', 'LIKE', '%' . $request['search'] . '%')
                ->orWhere('nama_channel', 'LIKE', '%' . $request['search'] . '%')
                ->orWhere('judul_seri', 'LIKE', '%' . $request['search'] . '%')
                ->orWhere('keterangan_kerja', 'LIKE', '%' . $request['search'] . '%')
                ->orWhere('link', 'LIKE', '%' . $request['search'] . '%')->paginate(15)]);
        } else {
            if (Auth::user()->role == 1) {
                return view('home', ['task' => task::where('user_id', '=', Auth::user()->id)->paginate(15)]);
            } else return view('admin', ['task' => task::paginate(15)]);
        }

        return view('/home');
    }
}
