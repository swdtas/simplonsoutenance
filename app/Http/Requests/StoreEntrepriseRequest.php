<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntrepriseRequest extends FormRequest
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
            'nom' => 'required|string|unique:entreprises',
            'description' => 'required|string',
            'adresse' => 'required|string',
            'site_web' => 'required|string',
            'date_creation' => 'nullable|date',
            'region_id' => 'required|exists:regions,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
    public function messages() {
        return [
            'nom.required' => 'Le nom de l\'entreprise est obligatoire.',
            'nom.min' => 'Le nom de l\'entreprise doit contenir au moins 3 caractères.',
            'nom.max' => 'Le nom de l\'entreprise ne peut pas dépasser 255 caractères.',
            'nom.unique' => 'Le nom de l\'entreprise est déjà utilisé.',
            'description.required' => 'La description de l\'entreprise est obligatoire.',
            'adresse.required' => 'L\'adresse de l\'entreprise est obligatoire.',
            'site_web.required' => 'Le site Web de l\'entreprise est obligatoire.',
            'date_creation.date' => 'La date de création doit être une date valide.',
            'region_id.required' => 'La région de l\'entreprise est obligatoire.',
            'region_id.exists' => 'La région sélectionnée n\'est pas valide.',
            'logo.image' => 'Le logo doit être une image.',
            'logo.mimes' => 'Le logo doit être de type :values.',
            'logo.max' => 'Le logo ne peut pas dépasser :max kilo-octets.',
            'name.required' => 'Le nom de l\'utilisateur est obligatoire.',
            'surname.required' => 'Le prénom de l\'utilisateur est obligatoire.',
            'email.required' => 'L\'adresse e-mail de l\'utilisateur est obligatoire.',
            'email.email' => 'L\'adresse e-mail doit être une adresse e-mail valide.',
            'email.unique' => 'L\'adresse e-mail de l\'utilisateur est déjà utilisée.',
            'password.required' => 'Le mot de passe de l\'utilisateur est obligatoire.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ];
    }
}
