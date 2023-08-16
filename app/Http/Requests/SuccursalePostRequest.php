<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuccursalePostRequest extends FormRequest
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
            'nom_succorsale' => 'required',
            'ICE' => 'required',
            'Email' => 'nullable',
            'Activite' => 'nullable',
            'ID_Fiscale' => 'required',
            'Ville' => 'nullable',
            'Tele' => 'nullable',
            'Adresse' => 'nullable',
            'Fax' => 'nullable',
            'FK_Regime' => 'required',
          
        ];
    }
    
}
