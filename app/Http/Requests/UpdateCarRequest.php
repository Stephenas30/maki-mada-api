<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom_voiture' => 'required',
            'boite' => 'required',
            'puissance' => 'required',
            'tarif' => 'required',
            'frais_livraison' => 'required',
            'place' => 'required',
            'coffre' => 'required',
            'porte' => 'required',
            'clim' => 'required',
            'radio' => 'required',
            'gps' => 'required',
            'rehausseur' => 'required',
            'bebe' => 'required',
            'traction' => 'required',
            'decapotable' => 'required',
            'utilitaire' => 'required',
            'dispo' => 'required',
            'lieu_dispo' => 'required',
            'motorisation' => 'required',
            'symbole' => 'required'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}