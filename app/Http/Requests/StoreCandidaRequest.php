<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // You may need to adjust this based on your authorization logic.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'resume_professionnel' => 'required|string',
            'cv' => 'required|mimes:pdf,doc,docx|max:5048', // Adjust the file types and size limit
            'linkedin' => 'nullable|string',
            'github' => 'nullable|string',
            'region_id' => 'required|exists:regions,id',
            'chercheur_id' => 'required|exists:chercheurs,id',
            'domaine_id' => 'required|exists:domaines,id',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'resume_professionnel.required' => 'Le résumé professionnel est obligatoire.',
            'resume_professionnel.string' => 'Le résumé professionnel doit être une chaîne de caractères.',
            'cv.required' => 'Le CV est obligatoire.',
            'cv.mimes' => 'Le CV doit être un fichier de type :values.',
            'cv.max' => 'Le CV ne doit pas dépasser :max kilo-octets.',
            'linkedin.string' => 'LinkedIn doit être une chaîne de caractères.',
            'github.string' => 'GitHub doit être une chaîne de caractères.',
            'region_id.required' => 'La région est obligatoire.',
            'region_id.exists' => 'La région sélectionnée n\'existe pas.',
            'chercheur_id.required' => 'Le chercheur est obligatoire.',
            'chercheur_id.exists' => 'Le chercheur sélectionné n\'existe pas.',
            'domaine_id.required' => 'Le domaine est obligatoire.',
            'domaine_id.exists' => 'Le domaine sélectionné n\'existe pas.',
        ];
    }
}
