<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $table ='clients';

    protected $fillable = [
        'Client_Principale',
        'Client_Societe',
        'Client_Ville',
        'Client_Tel',
        'Client_Emails',
        'Client_Note',
    ];
    public function villes()
    {
        return $this->belongsTo(Villes::class ,'Client_Ville');
    }
    public function produits(){
        return $this->hasMany(Produits::class);
    }
    public function bonreception()
    {
        return $this->hasMany(BonReception::class ,'BR_Client');
    }
    public function temporarytable()
    {
        return $this->hasMany(TemporaryTable::class ,'BR_Client');
    }

}
