<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Image;

class Car extends Model
{
    /**
     * Les attributs qui sont massivement assignables.
     *
     * @var array
     */
    
     protected $primaryKey = 'voiture_id';
     
     protected $fillable = [
        'nom_voiture',
        'boite',
        'puissance',
        'tarif',
        'frais_livraison',
        'place',
        'coffre',
        'porte',
        'clim',
        'radio',
        'gps',
        'rehausseur',
        'bebe',
        'traction',
        'decapotable',
        'utilitaire',
        'dispo',
        'lieu_dispo',
        'motorisation',
        'symbole',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
