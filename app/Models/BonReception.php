<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonReception extends Model
{
    use HasFactory;
    protected $fillable = [
        'BR_Date',
        'BR_Client',
        'BR_Qte',
        'BR_Transporte',
        'BR_Note',
        'BR_NoDocument',
    ];
    public function clients()
    {
        return $this->belongsTo(Clients::class ,'BR_Client');
    }

    public function transports()
    {
        return $this->belongsTo(Transports::class ,'BR_Transporte');
    }
    public function detail_br()
    {
        return $this->hasMany(Detail_Br::class ,'dBR_BR');
    }
    public function produits()
    {
        return $this->hasManyThrough(
            Produits::class,
            Detail_BR::class,
            'dBR_BR',
            'id',
            'id',
            'dBR_Produit'
        );
    }
    public function temporarytable()
    {
        return $this->hasMany(TemporaryTable::class ,'br_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->BR_Date = now()->format('Y-m-d');
        });
    }

}
