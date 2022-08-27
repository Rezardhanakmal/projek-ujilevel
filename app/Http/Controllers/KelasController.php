<?php

namespace App\Http\Controllers;

use App\Models\Kelaz;
use App\Models\Teacher;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(){
        $data = Kelas::with('teacher', 'kelazs')->paginate();
        return view('datakelas', compact('data'));
    }

    public function tambahkelas(){
        $tc = Teacher::all();
        $kl = Kelaz::all();
        return view('tambahkelas',compact('tc', 'kl'));
    }

    public function insertkelas(Request $request){
        $this->validate($request,[
            'kelazs_id'=>'required',
            'teacher_id'=>'required',
        ]);
        
        Kelas::create($request->all());
        return redirect()->route('kelas')->with('success',' Data Berhasil Ditambahkan');
    }

    public function edit($id){

        $tc = Teacher::all();
        $kl = Kelaz::all();
        $data = Kelas::find($id);
        return view('tampilkelas', compact('data', 'tc', 'kl'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'kelazs_id'=>'required',
            'teacher_id'=>'required',
        ]);

        $data = Kelas::find($id);
        $data->update($request->all());
        return redirect()->route('kelas')->with('success',' Data Berhasil Diupdate');
    }

    public function delete($id){
        $data = Kelas::find($id);
        $data->delete();
        return redirect()->route('kelas')->with('success',' Data Berhasil Dihapus');

    }
}
