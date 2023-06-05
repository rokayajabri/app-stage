<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transports extends Model
{
    use HasFactory;
    protected $fillable = [
        'Transport_Nom',
    ];
    public function bonreception()
    {
        return $this->hasMany(BonReception::class ,'BR_Transporte');
    }
    public function temporarytable()
    {
        return $this->hasMany(TemporaryTable::class ,'BR_Transporte');
    }
}
