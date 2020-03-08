<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $applicant_id
 * @property integer $quiestionnaire_template_id
 * @property Applicant $applicant
 * @property QuestionnaireTemplate $questionnaireTemplate
 * @property ApplicantAnswer[] $applicantAnswers
 */
class ApplicantQuestionnaire extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['applicant_id', 'quiestionnaire_template_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function applicant()
    {
        return $this->belongsTo('App\Models\Applicant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function questionnaireTemplate()
    {
        return $this->hasOne ('App\Models\QuestionnaireTemplate', 'id','quiestionnaire_template_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applicantAnswers()
    {
        return $this->hasMany('App\Models\ApplicantAnswer');
    }
}
