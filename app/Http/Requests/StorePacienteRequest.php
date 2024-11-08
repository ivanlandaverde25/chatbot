<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePacienteRequest extends FormRequest
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
            'nombres' => 'string|required|min:2|max:255',
            'apellidos' => 'string|required|min:2|max:255',
            'direccion' => 'string|required|min:2|max:300',
            'tipo_documento' => 'string|required|min:2|max:255',
            'numero_documento' => 'string|min:10|max:10|unique:pacientes,numero_documento',
            'correo' => 'string|min:5|max:255|unique:pacientes,correo',
            'numero_telefono' => 'string|min:8|max:12',
            'fecha_nacimiento' => 'date|required',
            'antecedentes' => 'string|max:300',
        ];
    }

    public function messages(): array {
        return [
            'nombres.required' => 'El nombre es obligatorio.',
            'nombres.min' => 'El nombre debe tener al menos 2 caracteres.',
            'nombres.max' => 'El nombre no puede superar los 255 caracteres.',
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'apellidos.min' => 'Los apellidos deben tener al menos 2 caracteres.',
            'apellidos.max' => 'Los apellidos no pueden superar los 255 caracteres.',
            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.min' => 'La dirección debe tener al menos 2 caracteres.',
            'direccion.max' => 'La dirección no puede superar los 300 caracteres.',
            'tipo_documento.required' => 'El tipo de documento es obligatorios.',
            'tipo_documento.min' => 'El tipo de documento debe tener al menos 2 caracteres.',
            'tipo_documento.max' => 'El tipo de documento no puede superar los 255 caracteres.',
            'numero_documento.min' => 'El número de documento debe tener al menos 10 caracteres.',
            'correo.min' => 'El correo debe tener al menos 5 caracteres.',
            'correo.max' => 'El correo no puede superar los 10 caracteres.',
        ];
    }
}
