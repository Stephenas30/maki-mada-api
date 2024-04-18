<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'voiture_id' => $this->voiture_id,
            'nom_voiture' => $this->nom_voiture,
            'boite' => $this->boite,
            'puissance' => $this->puissance,
            'tarif' => $this->tarif,
            'frais_livraison' => $this->frais_livraison,
            'place' => $this->place,
            'coffre' => $this->coffre,
            'porte' => $this->porte,
            'clim' => $this->clim,
            'radio' => $this->radio,
            'gps' => $this->gps,
            'rehausseur' => $this->rehausseur,
            'bebe' => $this->bebe,
            'traction' => $this->traction,
            'decapotable' => $this->decapotable,
            'utilitaire' => $this->utilitaire,
            'dispo' => $this->dispo,
            'lieu_dispo' => $this->lieu_dispo,
            'motorisation' => $this->motorisation,
            'symbole' => $this->symbole
        ];
    }
}