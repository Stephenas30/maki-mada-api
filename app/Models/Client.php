<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Client extends Model
{
    /**
     * Les attributs qui sont massivement assignables.
     *
     * @var array
     */
    
     protected $primaryKey = 'client_id';
     
     protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'ville',
        'pays',
        'email',
        'numero',
        'payement',
        'devise',
        'num_vol_d',
        'num_vol_r',
        'hotel',
        'assurance',
        'annulation',
        'boite',
        'gps',
        'rehausseur',
        'bebe',
        'date_depart',
        'date_retour',
        'lieu_depart',
        'lieu_depart_detaille',
        'lieu_retour',
        'lieu_retour_detaille'
    ];

    public function car()
    {
        return $this->hasOne(Car::class);
    }
}
