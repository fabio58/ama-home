<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $questionnaire_template_id
 * @property string $question
 * @property string $question_type
 * @property string $values
 * @property boolean $extended_value
 * @property string $extended_placeholder
 * @property integer $order
 * @property string $created_at
 * @property string $updated_at
 * @property QuestionnaireTemplate $questionnaireTemplate
 */
class QuestionnaireTemplateQuestion extends Model
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
    protected $fillable = ['questionnaire_template_id', 'question', 'question_type', 'values', 'extended_value', 'extended_placeholder', 'order', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function questionnaireTemplate()
    {
        return $this->belongsTo('App\Models\QuestionnaireTemplate');
    }
}
