<?php

namespace App\Http\Requests\Admin\Applicant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateApplicant extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.applicant.edit', $this->applicant);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'names' => ['nullable', 'string'],
            'last_names' => ['nullable', 'string'],
            'birthdate' => ['nullable', 'date'],
            'gender' => ['nullable', 'string'],
            'state_id' => ['nullable', 'string'],
            'city_id' => ['nullable', 'string'],
            'education_level' => ['required'],
            'government_id' => ['nullable', 'string'],
            'marital_status' => ['nullable', 'string'],
            'pregnant' => ['nullable', 'boolean'],
            'pregnancy_due_date' => ['nullable', 'string'],
            'parent_applicant' => ['nullable', 'string'],
            'applicant_relationship' => ['nullable', 'string'],
            'cadaster' => ['nullable', 'string'],
            'property_id' => ['nullable', 'string'],
            'occupation' => ['nullable', 'string'],
            'monthly_income' => ['nullable', 'numeric'],

        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }

    public function getEducationLevelId()
    {
        if ($this->has('education_level')) {
            return $this->get('education_level')['id'];
        }
        return null;
    }
}
