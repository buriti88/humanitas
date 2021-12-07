<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\BasicModelRequest;

class CreateEmployeeRequest extends BasicModelRequest
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
            'name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'title_id' => 'required',
        ];
    }

     /**
     * @return string
     */
    protected function getLangFile(): string
    {
        return 'employees';
    }
}
