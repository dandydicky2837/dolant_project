<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Http\Requests\StoretaskRequest;
use App\Http\Requests\UpdatetaskRequest;
use Illuminate\Console\View\Components\Task as ComponentsTask;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretaskRequest $request)
    {   
        $validated = $request->validate([
            'jenis_pekerjaan' => 'required',
            'nama_channel' => 'required',
            'judul_seri' => 'required',
            'keterangan_kerja' => 'required',
            'link' => 'required',
        ]);
        if ($validated) {
            $data = [
                'user_id' => $request->user()->id,
                'jenis_pekerjaan' => $request->jenis_pekerjaan,
                'nama_channel' => $request->nama_channel,
                'judul_seri' => $request->judul_seri,
                'keterangan_kerja' => $request->keterangan_kerja,
                'link' => $request->link,
            ];
            Task::create($data);
            return redirect('/home');
        }
        return view('create');
    }

    public function validasi($id)
    {
        $task = Task::find($id);
        $task->validasi = 1;
        $task->save();

       return redirect('/home'); 
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {
        return view('/home',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetaskRequest  $request
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetaskRequest $request, $id)
    {
        $task = task::find($id);
        if ($task==null) {
            redirect('/home')
                          ->with(['error'=>'data tidak ditemukan']);
        }
        $validated = $request->validate([
            'jenis_pekerjaan' => 'required',
            'nama_channel' => 'required',
            'judul_seri' => 'required',
            'keterangan_kerja' => 'required',
            'link' => 'required',
         ]);

         if (!$validated) {
            
            redirect('/home')
                          ->with(['error'=>'data tidak valid']);
         }
  
         $task->update($validated);
         $task->save();
  
         return redirect('/home')
                          ->with(['success'=>'data berhasil di ubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $task=task::find($id);
        if ($task!=null){
            $task->delete();
        }
        return redirect('/home');
    }

    public function search(Request $request){
        if ($request->has('search')){
            $task = task::where('name','LIKE','%'.$request.'%')->get();
        }
        else{
            $task = task::all();
        }

        return view('/home');
    }
}
