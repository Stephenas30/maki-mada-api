<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'client_id' => $this->client_id,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'adresse' => $this->adresse,
            'ville' => $this->ville,
            'pays' => $this->pays,
            'email'=> $this->email,
            'numero' => $this->numero,
            'payement' => $this->payement,
            'devise' => $this->devise,
            'num_vol_d' => $this->num_vol_d,
            'num_vol_r' => $this->num_vol_r,
            'hotel' => $this->hotel,
            'assurance' => $this->assurance,
            'annulation' => $this->annulation,
            'boite' => $this->boite,
            'gps' => $this->gps,
            'rehausseur' => $this->rehausseur,
            'bebe' => $this->bebe,
            'date_depart' => $this->date_depart,
            'date_retour' => $this->date_retour,
            'lieu_depart' => $this->lieu_depart,
            'lieu_depart_detaille' => $this->lieu_depart_detaille,
            'lieu_retour' => $this->lieu_retour,
            'lieu_retour_detaille' => $this->lieu_retour_detaille
        ];
    }
}