<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zones extends Model
{
    use HasFactory;

    protected $table = 'zones';

    protected $fillable = [
        'Zone_Nom',
    ];

    public function villes()
    {
        return $this->hasMany(Villes::class ,'Ville_Zone');
    }
}
