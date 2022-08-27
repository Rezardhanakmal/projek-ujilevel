<?php

namespace App\Models;

use App\Models\Agenda;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelaz extends Model
{
    use HasFactory;

    protected $table = "kelazs";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function kelas(){
        return $this->hasMany(Kelas::class);
    }

    public function agendas(){
        return $this->hasMany(Agenda::class);
    }
}
