<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOffresRequest extends FormRequest
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
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'Profile' => 'required|string|max:255',
            'entreprise_id' => 'required|exists:entreprises,id',
        ];
    }

    public function messages()
    {
        return [
            'titre.required' => 'Le titre de l\'offre est requis.',
            'titre.max' => 'Le titre de l\'offre ne peut pas dépasser :max caractères.',
            'description.required' => 'La description de l\'offre est requise.',
            'Profile.required' => 'Le profil de l\'offre est requis.',
            'Profile.max' => 'Le profil de l\'offre ne peut pas dépasser :max caractères.',
            'entreprise_id.required' => 'L\'entreprise est requise.',
            'entreprise_id.exists' => 'L\'entreprise sélectionnée n\'existe pas.',
        ];
    }
}
