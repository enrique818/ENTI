<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            // 'perfil' => 'required|in:startup,inversionista,firma,expertos,mentores,influencer',
            'nombre' => 'required|min:4|max:255',
            'email' => 'required|email',
            'pais' => 'required',
            // 'industria_id' => 'requiredIf:perfil,startup,expertos,mentores,influencer',
            // 'estado' => 'requiredIf:perfil,startup',
            'logo' => 'required',
            'avatar' => 'mimes:png,jpg,jpeg',
        ];
    }
}
