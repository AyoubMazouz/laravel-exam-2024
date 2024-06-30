<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'country' => 'required|string',
            'city' => 'required|string',
            'sex' => 'required|in:Male,Female,Other',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'cv' => 'required|file|mimes:pdf,doc,docx',
            'photo' => 'required|file|mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Le prénom est requis.',
            'first_name.string' => 'Le prénom doit être une chaîne de caractères.',
            'first_name.max' => 'Le prénom ne doit pas dépasser 255 caractères.',
            'last_name.required' => 'Le nom est requis.',
            'last_name.string' => 'Le nom doit être une chaîne de caractères.',
            'last_name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'birth_date.required' => 'La date de naissance est requise.',
            'birth_date.date' => 'La date de naissance doit être une date valide.',
            'country.required' => 'Le pays est requis.',
            'country.string' => 'Le pays doit être une chaîne de caractères.',
            'city.required' => 'La ville est requise.',
            'city.string' => 'La ville doit être une chaîne de caractères.',
            'sex.required' => 'Le sexe est requis.',
            'sex.in' => 'Le sexe doit être l\'un des suivants : Homme, Femme, Autre.',
            'email.required' => 'L\'email est requis.',
            'email.string' => 'L\'email doit être une chaîne de caractères.',
            'email.email' => 'L\'email doit être une adresse email valide.',
            'email.max' => 'L\'email ne doit pas dépasser 255 caractères.',
            'password.required' => 'Le mot de passe est requis.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit comporter au moins 8 caractères.',
            'password.confirmed' => 'Le mot de passe et sa confirmation ne correspondent pas.',
            'cv.required' => 'Le CV est requis.',
            'cv.file' => 'Le CV doit être un fichier.',
            'cv.mimes' => 'Le CV doit être un fichier de type: pdf, doc, docx.',
            'photo.required' => 'La photo est requise.',
            'photo.file' => 'La photo doit être un fichier.',
            'photo.mimes' => 'La photo doit être un fichier de type: jpg, jpeg, png.',
        ];
    }
}
