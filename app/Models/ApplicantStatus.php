<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $applicant_id
 * @property integer $status_id
 * @property string $file_number
 * @property string $financial_entity_id
 * @property string $atc_id
 * @property string $entity_id
 * @property int $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property Applicant $applicant
 * @property Status $status
 */
class ApplicantStatus extends Model
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
    protected $fillable = ['applicant_id', 'status_id', 'file_number', 'financial_entity_id', 'atc_id', 'entity_id', 'user_id', 'created_at', 'updated_at'];

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
    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}
