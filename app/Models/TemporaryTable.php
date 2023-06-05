<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'br_id',
        'detail_br_id',
        'BR_Date',
        'BR_Client',
        'BR_Qte',
        'BR_Transporte',
        'BR_Note',
        'BR_NoDocument',

        'dBR_BR',
        'dBR_Produit',
        'dBR_SN',
        'dBR_Etat_Reparation',
        'dBR_Garantie',
        'dBR_Accessoires',
        'dBR_Technicien',
        'dBR_Note',
    ];

    public function bonReception()
    {
        return $this->belongsTo(BonReception::class, 'br_id');
    }

    public function detailBr()
    {
        return $this->belongsTo(DetailBr::class, 'detail_br_id');
    }
    public function clients()
    {
        return $this->belongsTo(Clients::class ,'BR_Client');
    }

    public function transports()
    {
        return $this->belongsTo(Transports::class ,'BR_Transporte');
    }
    public function produits()
    {
        return $this->belongsTo(Produits::class, 'dBR_Produit');
    }
    public function produit_etat_reparation()
    {
        return $this->belongsTo(Produit_Etat_Reparation::class,'dBR_Etat_Reparation');
    }
    public function techniciens()
    {
        return $this->belongsTo(Techniciens::class, 'dBR_Technicien');
    }
}
