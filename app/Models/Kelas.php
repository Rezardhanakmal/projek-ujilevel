<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = "kelas";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function kelazs(){
        return $this->belongsTo(Kelaz::class);
    }
}
