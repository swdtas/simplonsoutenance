<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChercheurRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'surname' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|email|unique:users',
            'adresse' => 'required|string|max:255',
            'date_naissance' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'genre' => 'nullable|string|in:Homme,Femme',
            'statut_matrimonial' => 'nullable|string|in:Célibataire,Marié(e),Divorcé(e)',
            'telephone' => 'nullable|string|max:20',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le champ "Nom" est obligatoire.',
            'surname.required' => 'Le champ "Prénom(s)" est obligatoire.',
            'adresse.required' => 'Le champ "Adresse" est obligatoire.',
            'email.required' => 'Le champ "Email" est obligatoire.',
            'email.email' => 'Veuillez fournir une adresse email valide.',
            'photo.image' => 'La photo doit être une image.',
            'photo.mimes' => 'La photo doit être de type :values.',
            'photo.max' => 'La photo ne peut pas dépasser :max kilo-octets.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'password.required' => 'Le champ "Mot de passe" est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ];
    }
}
