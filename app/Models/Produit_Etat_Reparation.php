<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit_Etat_Reparation extends Model
{
    use HasFactory;
    protected $fillable = [
        'EtatReparation_Ref',
        'EtatReparation_Description',
    ];
    public function detail_br()
    {
        return $this->hasMany(Detail_Br::class ,'dBR_Etat_Reparation');
    }
    public function temporarytable()
    {
        return $this->hasMany(TemporaryTable::class ,'dBR_Etat_Reparation');
    }
}
