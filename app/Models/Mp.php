<?php

namespace App\Models;

use App\Models\Agenda;
use App\Models\Guru;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mp extends Model
{
    use HasFactory;

    protected $table = "mps";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function gurus(){
        return $this->hasMany(Guru::class);
    }

    public function agendas(){
        return $this->hasMany(Agenda::class);
    }
}
