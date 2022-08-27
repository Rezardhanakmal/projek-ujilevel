<?php

namespace App\Models;

use App\Models\Agenda;
use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

  protected $table = "teacher";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function kelas(){
        return $this->hasMany(Kelas::class);
    }
    
    public function gurus(){
        return $this->hasMany(Guru::class);
    }

    public function agendas(){
        return $this->hasMany(Agenda::class);
    }
}
