<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
        /**
         * Validate:-
         *  title,price,weight,
         * quantity,small_description,large_description
         * manufacturer,category , Tags,
         * images,location
         *
         */
        return [
            'title' => 'required',
            'price'=>'required|numeric',
            'weight'=>'required|numeric',
            'quantity'=>'required|integer',
            'manufacturer'=>'required|string|min:2|max:255',
            'photo[]' => 'image',
            // 'photo[]' => 'image|mimes:jpeg,bmp,png|size:2000',
            // 'category_id'=>'required',
            'small_description'=>'required|min:20|max:100',
            'large_description'=>'required|min:30|max:500'
            
           

        ];
    }
}
