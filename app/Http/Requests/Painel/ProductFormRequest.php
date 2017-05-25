<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'number' => 'required|numeric',
            'category' => 'required',
            'description' => 'min:3|max:1000',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O campo nome é de preenchimento obrigatório!',
            'name.min' => 'O campo nome deve possuir no minimo 3 caracteres!',
            'name.max' => 'O campo nome deve possuir no maximo 100 caracteres!',
            'number.required' => 'O campo número é de preenchimento obrigatório!',
            'number.numeric' => 'O campo número deve ser preenchido apenas com numeros!',
            'category.required' => 'O campo categoria é de preenchimento obrigatório!',
            'description.min' => 'A descrição deve possuir no minimo 3 caracteres!',
            'description.min' => 'A descrição deve possuir no maximo 1000 caracteres!'
        ];
    }
}
