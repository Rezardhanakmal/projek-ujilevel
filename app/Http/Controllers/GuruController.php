<?php

namespace App\Http\Controllers;

use App\Models\Mp;
use App\Models\Teacher;
use App\Models\Guru;
use Illuminate\Http\Request;


class GuruController extends Controller
{
    public function index(){
        $data = Guru::with('teacher', 'mps')->paginate();
        return view('dataguru', compact('data'));
    }

    public function tambahguru(){
        $mp = Mp::all();
        $tc = Teacher::all();
        return view('tambahguru',compact('tc', 'mp'));
    }

    public function insertguru(Request $request){
        $this->validate($request,[
            'teacher_id'=>'required',
            'mps_id'=>'required',
        ]);

        Guru::create($request->all());
        return redirect()->route('guru')->with('success',' Data Berhasil Ditambahkan');
    }

    public function edit($id){

        $mp = Mp::all();
        $tc = Teacher::all();
        $data = Guru::with('teacher', 'mps')->findorfail($id);
        return view('tampilguru', compact('data', 'tc', 'mp'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'teacher_id'=>'required',
            'mps_id'=>'required',
        ]);

        $data = Guru::find($id);
        $data->update($request->all());
        return redirect()->route('guru')->with('success',' Data Berhasil Diupdate');
    }

    public function delete($id){
        $data = Guru::find($id);
        $data->delete();
        return redirect()->route('guru')->with('success',' Data Berhasil Dihapus');

    }

    
}
