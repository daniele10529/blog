<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //di default dopo la creazione è false, va settato a true
        //altrimenti non parte la richiesta
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //serve a definire i setting di validazione dei campi del form
        //come i campi obbligatori da completare
        //attraverso la request si acquisiscono i dati
        //inviati dal form
        return [
            'title' => 'required',
            'content' => 'required',
            'categories' => 'required',
        ];
    }
}
