<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'perfil' => 'required|in:startup,inversionista,firma,expertos,mentores,influencer',
            'nombre' => 'required|min:4|max:255',
            'email' => 'required|email|unique:users,email',
            'pais' => 'required',
            'industria_id' => 'requiredIf:perfil,startup,expertos,mentores,influencer',
            'estado' => 'requiredIf:perfil,startup',
            'password' => 'required|min:4|max:32',
            'confirm_password' => 'required|same:password',
            'logo' => 'required',
            'avatar' => 'requiredIf:logo,personalizado|mimes:png,jpg,jpeg',
            'ventas' => 'requiredIf:perfil,startup|nullable|in:5,10,20,50,100,max',
            'capital_institucional' => 'requiredIf:perfil,startup|nullable|in:si,no',
            'prestamo_financiero' => 'requiredIf:perfil,startup|nullable|in:si,no',
            'equipo' => 'requiredIf:perfil,startup|nullable|in:1,5,10,50,mas',
            'tipo_capital' => 'requiredIf:perfil,firma|nullable|array',
            'experiencia' => 'requiredIf:perfil,mentores,expertos|nullable|in:1,5,10,mas',
            'fundador' => 'requiredIf:perfil,mentores,expertos|nullable|in:si,no',
            'formacion' => 'requiredIf:perfil,inversionista|nullable|array',
            'engagement' => 'requiredIf:perfil,influencer|nullable|numeric',
            'seguidores' => 'requiredIf:perfil,influencer|nullable|in:20,50,100,250,mas',
        ];
    }
}
