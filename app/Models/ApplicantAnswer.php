<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $applicant_questionnaire_id
 * @property string $answer
 * @property string $extended_value
 * @property string $created_at
 * @property string $updated_at
 * @property ApplicantQuretionnaire $applicantQuretionnaire
 */
class ApplicantAnswer extends Model
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
    protected $fillable = ['applicant_questionnaire_id', 'answer', 'extended_value', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function applicantQuretionnaire()
    {
        return $this->belongsTo('App\Models\ApplicantQuretionnaire', 'applicant_questionnaire_id');
    }
}
