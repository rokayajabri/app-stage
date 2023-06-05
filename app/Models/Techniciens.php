<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Techniciens extends Model
{
    use HasFactory;
    protected $fillable = [
        'Tech_Name',
        'Tech_Note',
    ];
    public function detail_br()
    {
        return $this->hasMany(Detail_Br::class ,'dBR_Technicien');
    }
    public function temporarytable()
    {
        return $this->hasMany(TemporaryTable::class ,'dBR_Technicien');
    }
}
