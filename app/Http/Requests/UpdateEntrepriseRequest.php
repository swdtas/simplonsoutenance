<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEntrepriseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Adjust authorization logic as needed
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
            'nom' => 'required|string|max:255',
            'site_web' => 'nullable|url|max:255',
            'adresse' => 'required|string|max:255',
            'date_creation' => 'nullable|date',
            'region_id' => 'required|exists:regions,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
            'description' => 'required|string',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom de l\'entreprise est obligatoire.',
            'site_web.url' => 'Le format du site web est invalide.',
            'adresse.required' => 'L\'adresse de l\'entreprise est obligatoire.',
            'region_id.required' => 'Veuillez sélectionner une région.',
            'logo.image' => 'Le logo doit être une image.',
            'logo.mimes' => 'Le logo doit être de type :jpeg, :png, :jpg ou :gif.',
            'logo.max' => 'La taille maximale du logo est de 2048 kilo-octets.',
            'description.required' => 'La description de l\'entreprise est obligatoire.',
        ];
    }
}
