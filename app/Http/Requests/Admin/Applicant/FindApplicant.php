<?php

namespace App\Http\Requests\Admin\Applicant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;


class FindApplicant extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
       return true;
       //return Gate::allows('admin.applicant.find', $this->applicant);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            // 'orderBy' => 'in:id,applicant_id,id,file_number,financial_entity_id,atc_id,entity_id,user_id|nullable',
            // 'orderDirection' => 'in:asc,desc|nullable',
            // 'search' => 'string|nullable',
            // 'page' => 'integer|nullable',
            // 'per_page' => 'integer|nullable',

        ];
    }
}
