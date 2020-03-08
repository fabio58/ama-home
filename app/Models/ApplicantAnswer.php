<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantAnswer extends Model
{
    protected $fillable = [
        'applicant_questionnaire_id',
        'answer',
        'extended_value',
        'question_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/applicant-answers/'.$this->getKey());
    }
}
