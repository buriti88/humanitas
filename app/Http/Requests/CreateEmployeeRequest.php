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
            'habeas_data' => 'required',
            'identification_card' => 'required|numeric|digits_between:4,10',
            'expedition_date' => 'required',
            'date_birth' => 'required',
            'gender_id' => 'required',
            'telephone' => 'required|numeric|digits_between:7,10',
            'address' => 'required|string|max:191',
            'municipality_id' => 'required',
            'neighborhood' => 'required|string|max:191',
            'type_housing_id' => 'required',
            'stratum_id' => 'required',
            'email' => 'required|email|string|max:191',
            'rh_id' => 'required',
            'marital_status_id' => 'required',
            'number_children' => 'required|numeric',
            'function_manual' => 'required',
            'certificate_degrees' => 'required',
            'title_verification' => 'required',
            'resolution_rethus' => 'required',
            'professional_card' => 'required',
            'advan_life_support' => 'required',
            'certific_victims_sexual_violence' => 'required',
            'court_ethics_certific' => 'required',
            'card_protect_validity' => 'required',
            'civil_liability_policy' => 'required',
            'occupational_exam' => 'required',
            'health_id' => 'required',
            'pension_id' => 'required',
            'cesantias_id' => 'required',
            'arl_id' => 'required',
            'account_number' => 'required|numeric',
            'account_type_id' => 'required',
            'bank_id' => 'required',
            'date_admission' => 'required',
            'concept_type_id' => 'required',
            'date_end' => 'required',
            'name_institute' => 'required',
            'folio_number' => 'required',
            'observation' => 'nullable',
            'picture' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'nullable'
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
