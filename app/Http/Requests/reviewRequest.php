<?php

namespace App\Http\Requests;

use App\Http\Requests\Request as FormRequest;

class reviewRequest extends FormRequest
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
        if ($this->isStore()) {
            // validation rule for create request.
            return [
                'title'=>'required',
                'description'=>'required'
            ];
        }

        if ($this->isUpdate()) {
            // Validation rule for update request.
            return [

            ];
        }

        // Default validation rule.
        return [

        ];
    }
}
