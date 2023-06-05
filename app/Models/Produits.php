<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    use HasFactory;
    protected $fillable = [
        'Produit_Ref',
        'Produit_Cath',
        'Produit_Description',
    ];
    public function cathegories()
    {
        return $this->belongsTo(Cathegories::class ,'Produit_Cath');
    }
    public function produit_photos()
    {
        return $this->hasMany(Produit_Photos::class ,'Ph_Pr');
    }
    public function detail_br()
    {
        return $this->hasMany(Detail_Br::class ,'dBR_Produit');
    }
    public function temporarytable()
    {
        return $this->hasMany(TemporaryTable::class ,'dBR_Produit');
    }
}
