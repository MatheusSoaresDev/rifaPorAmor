<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RifaCreateRequest extends FormRequest
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
            'nome_rifa' => 'required',
            'data_fechamento' => 'after:'.date("Y-m-d", strtotime("-1 days")),
            'limite_part' => 'numeric|min:1',
            'objetivo' => 'required',
            'premio' => 'required'
        ];
    }
}
