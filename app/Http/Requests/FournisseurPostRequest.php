<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FournisseurPostRequest extends FormRequest
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
            'nomFournisseurs' => 'required',
            'Designation' => 'required',
            'Adresse' => 'nullable',
            'telephone' => 'nullable',
            'ville' => 'nullable',
            'NICE' => 'required',
            'Fax' => 'nullable',
            'Num_compte_comptable' => 'required',
            'ID_fiscale' => 'required',
          
        ];
    }
}
