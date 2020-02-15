<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $questionnaire_type_id
 * @property string $name
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 * @property QuestionnaireType $questionnaireType
 * @property ApplicantQuestionnaire[] $applicantQuestionnaires
 * @property QuestionnaireTemplateQuestion[] $questionnaireTemplateQuestions
 */
class QuestionnaireTemplate extends Model
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
    protected $fillable = ['questionnaire_type_id', 'name', 'enabled', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function questionnaireType()
    {
        return $this->belongsTo('App\Models\QuestionnaireType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applicantQuestionnaires()
    {
        return $this->hasMany('App\Models\ApplicantQuestionnaire', 'quiestionnaire_template_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questionnaireTemplateQuestions()
    {
        return $this->hasMany('App\Models\QuestionnaireTemplateQuestion');
    }

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/questionnaire-templates/'.$this->getKey());
    }

}
