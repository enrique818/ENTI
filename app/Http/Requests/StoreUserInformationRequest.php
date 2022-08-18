<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'descripcion' => 'nullable|max:1000',
            'twitter' => 'nullable|min:4|max:255',
            'tiktok' => 'nullable|min:4|max:255',
            'facebook' => 'nullable|min:4|max:255',
            'instagram' => 'nullable|min:4|max:255',
            'linkedin' => 'nullable|min:4|max:255',
            'youtube' => 'nullable|min:4|max:255',
            'web' => 'nullable|min:4|max:255',
            'ventas' => 'nullable|in:5,10,20,50,100,max',
            'capital_institucional' => 'nullable|in:si,no',
            'prestamo_financiero' => 'nullable|in:si,no',
            'equipo' => 'nullable|in:1,5,10,50,mas',
            'tipo_capital' => 'nullable|array',
            'experiencia' => 'nullable|in:1,5,10,mas',
            'industria_id' => 'nullable|exists:industrias,id',
            'estado' => 'nullable|in:marcha,idea',
            'fundador' => 'nullable|in:si,no',
            'formacion' => 'nullable|array',
            'engagement' => 'nullable|numeric',
            'precio' => 'nullable|min:1|max:255',
            'seguidores' => 'nullable|in:20,50,100,250,mas',
        ];
    }
}
