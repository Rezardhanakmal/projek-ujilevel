<?php

namespace App\Http\Controllers;

use App\Models\Mp;
use App\Models\Kelaz;
use App\Models\Teacher;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index(){
        $data = Agenda::with('teacher', 'kelazs', 'mps')->paginate();
        return view('dataagenda', compact('data'));
    }

    public function tambahagenda(){
        $kl = Kelaz::all();
        $mp = Mp::all();
        $tc = Teacher::all();
        return view('tambahagenda',compact('tc', 'mp', 'kl'));
    }

    public function insertagenda(Request $request){
        $this->validate($request,[
            'teacher_id'=>'required',
            'mps_id'=>'required',
            'materi'=>'required',
            'jp'=>'required',
            'absen_siswa'=>'required',
            'dokumentasi'=>'required',
            'kelazs_id'=>'required',
            'absen_guru'=>'required',
            'jam_mulai'=>'required',
            'jam_berakhir'=>'required',
        ]);

        $data = Agenda::create($request->all()); 
      if($request->hasFile('dokumentasi')){ 
          $request->file('dokumentasi')->move('gambar/', $request->file('dokumentasi')->getClientOriginalName()); 
          $data->dokumentasi = $request->file('dokumentasi')->getClientOriginalName(); 
          $data->save(); 
      }
        return redirect()->route('agenda')->with('success',' Data Berhasil Ditambahkan');
    }

    public function edit($id){

        $tc = Teacher::all();
        $kl = Kelaz::all();
        $mp = Mp::all();
        $data = Agenda::find($id);
        return view('tampilagenda', compact('data', 'mp', 'kl', 'tc'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'teacher_id'=>'required',
            'mps_id'=>'required',
            'materi'=>'required',
            'jp'=>'required',
            'absen_siswa'=>'required',
            'dokumentasi'=>'required',
            'kelazs_id'=>'required',
            'absen_guru'=>'required',
            'jam_mulai'=>'required',
            'jam_berakhir'=>'required',
        ]);

        $data = Agenda::find($id);
        $data->update($request->all());
        if($request->hasFile('dokumentasi')){ 
            $request->file('dokumentasi')->move('gambar/', $request->file('dokumentasi')->getClientOriginalName()); 
            $data->dokumentasi = $request->file('dokumentasi')->getClientOriginalName(); 
            $data->save();
        } 
        return redirect()->route('agenda')->with('success',' Data Berhasil Diupdate');
    }

    public function delete($id){
        $data = Agenda::find($id);
        $data->delete();
        return redirect()->route('agenda')->with('success',' Data Berhasil Dihapus');

    }
}
