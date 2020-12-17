<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ImageFormRequest extends FormRequest
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
        //se c'è un file validalo verificando sia un immagine
        if($this->hasFile('image')){
            return [
                'image' => 'required|image|mimes:jpeg, jpg, png, gif, svg|max:4096',
            ];
        }

    }
}
