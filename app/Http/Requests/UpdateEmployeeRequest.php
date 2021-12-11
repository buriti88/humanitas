<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends CreateEmployeeRequest
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
            'name' => 'sometimes|required|string|max:191',
            'last_name' => 'sometimes|required|string|max:191',
            'title_id' => 'sometimes|required',
            'habeas_data' => 'sometimes|required',
            'identification_card' => 'sometimes|required|numeric|digits_between:4,10',
            'expedition_date' => 'sometimes|required|date',
            'date_birth' => 'sometimes|required|date',
            'gender_id' => 'sometimes|required',
            'telephone' => 'sometimes|required|numeric|digits_between:7,10',
            'address' => 'sometimes|required|string|max:191',
            'municipality_id' => 'sometimes|required',
            'neighborhood' => 'sometimes|required|string|max:191',
            'type_housing_id' => 'sometimes|required',
            'stratum_id' => 'sometimes|required',
            'email' => 'sometimes|required|email|string|max:191',
            'rh_id' => 'sometimes|required',
            'marital_status_id' => 'sometimes|required',
            'number_children' => 'sometimes|required|numeric',
            'funtion_manual' => 'sometimes|required',
            'certificate_degress' => 'sometimes|required',
            'title_verification' => 'sometimes|required',
            'resolution_rethus' => 'sometimes|required',
            'professional_card' => 'sometimes|required',
            'advan_life_support' => 'sometimes|required',
            'certific_victims_sexual_violence' => 'sometimes|required',
            'court_ethics_certific' => 'sometimes|required',
            'card_protect_validity' => 'sometimes|required',
            'civil_liability_policy' => 'sometimes|required',
            'occupational_exam' => 'sometimes|required',
            'health_id' => 'sometimes|required',
            'pension_id' => 'sometimes|required',
            'arl_id' => 'sometimes|required',
            'account_number' => 'sometimes|required|numeric',
            'account_type_id' => 'sometimes|required',
            'bank_id' => 'sometimes|required',
            'date_admission' => 'sometimes|required|date',
            'concept_type_id' => 'sometimes|required',
            'date_end' => 'sometimes|required|date',
            'observations' => 'nullable',
        ];
    }
}
