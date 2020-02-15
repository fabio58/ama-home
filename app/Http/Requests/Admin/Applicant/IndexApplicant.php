<?php

namespace App\Http\Requests\Admin\Applicant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class IndexApplicant extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.applicant.index');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'orderBy' => 'in:id,names,last_names,birthdate,gender,state_id,city_id,education_level,government_id,marital_status,pregnant,pregnancy_due_date,parent_applicant,applicant_relationship,cadaster,property_id,occupation,monthly_income|nullable',
            'orderDirection' => 'in:asc,desc|nullable',
            'search' => 'string|nullable',
            'page' => 'integer|nullable',
            'per_page' => 'integer|nullable',

        ];
    }
}
