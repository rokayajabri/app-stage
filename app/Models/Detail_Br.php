<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Br extends Model
{
    use HasFactory;
    protected $fillable = [
        'dBR_BR',
        'dBR_Produit',
        'dBR_SN',
        'dBR_Problem',
        'dBR_Etat_Reparation',
        'dBR_ChangeStatut',
        'dBR_Garantie',
        'dBR_RepairDetail',
        'dBR_Accessoires',
        'dBR_Technicien',
        'dBR_Photo',
        'dBR_Note',
    ];
    public function produits()
    {
        return $this->belongsTo(Produits::class, 'dBR_Produit');
    }
    public function bonreception()
    {
        return $this->belongsTo(BonReception::class,'dBR_BR');
    }
    public function produit_etat_reparation()
    {
        return $this->belongsTo(Produit_Etat_Reparation::class,'dBR_Etat_Reparation');
    }
    public function change_status()
    {
        return $this->belongsTo(Change_Statut::class,'dBR_ChangeStatut');
    }
    public function techniciens()
    {
        return $this->belongsTo(Techniciens::class, 'dBR_Technicien');
    }
    public function clients()
    {
        return $this->hasManyThrough(
            Clients::class,
            BonReception::class,
            'dBR_BR',
            'id',
            'id',
            'BR_Client'
        );
    }
    public function temporarytable()
    {
        return $this->hasMany(TemporaryTable::class ,'detail_br_id');
    }

}

