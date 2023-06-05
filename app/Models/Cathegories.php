<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cathegories extends Model
{
    use HasFactory;
    protected $fillable = [
        'Cath_Nom',
        'Cath_Designation',
    ];
    public function produits()
    {
        return $this->hasMany(Produits::class ,'Produit_Cath');
    }

}
