<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = "agendas";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function mps(){
        return $this->belongsTo(Mp::class);
    }

    public function kelazs(){
        return $this->belongsTo(Kelaz::class);
    }
}

