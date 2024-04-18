<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class UpdateClientRequest extends FormRequest
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
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'pays' => 'required',
            'email' => 'required',
            'payement' => 'required',
            'devise' => 'required',
            'assurance' => 'required',
            'annulation' => 'required',
            'boite' => 'required',
            'rehausseur' => 'required',
            'bebe' => 'required',
            'date_depart' => 'required',
            'date_retour' => 'required',
            'lieu_depart' => 'required',
            'lieu_retour' => 'required'
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