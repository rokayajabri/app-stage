<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit_Photos extends Model
{
    use HasFactory;
    protected $fillable = [
        'Ph_Pr',
        'Ph_Nom',
        'Ph_Image',
    ];
    public function produits()
    {
        return $this->belongsTo(Produits::class,'Ph_Pr');
    }
}
