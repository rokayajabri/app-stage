<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villes extends Model
{
    use HasFactory;

    protected $table ='villes';

    protected $fillable = [
        'Ville_Nom',
        'Ville_Zone',
    ];

    public function clients()
    {
        return $this->hasMany(Clients::class ,'Client_Ville');
    }
    public function zones()
    {
        return $this->belongsTo(Zones::class ,'Ville_Zone');
    }
}
