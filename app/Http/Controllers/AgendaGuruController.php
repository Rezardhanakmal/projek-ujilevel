<?php

namespace App\Http\Controllers;

use App\Models\Mp;
use App\Models\Kelaz;
use App\Models\Teacher;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaGuruController extends Controller
{
    public function index(){
        $data = Agenda::with('teacher', 'kelazs', 'mps')->paginate();
        return view('dataagendaguru', compact('data'));
    }

    public function tambahagendaguru(){
        $kl = Kelaz::all();
        $mp = Mp::all();
        $tc = Teacher::all();
        return view('tambahagendaguru',compact('tc', 'mp', 'kl'));
    }

    public function insertagendaguru(Request $request){
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
        return redirect()->route('agendaguru')->with('success',' Data Berhasil Ditambahkan');
    }

}
