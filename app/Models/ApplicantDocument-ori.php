<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $applicant_id
 * @property integer $document_id
 * @property string $created_at
 * @property string $updated_at
 * @property Applicant $applicant
 * @property DocumenType $DocumenType
 */
class ApplicantDocuments extends Model
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
    protected $fillable = ['id', 'applicant_id', 'document_id',  'created_at', 'updated_at'];

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
    public function DocumenTypes()
    {
        return $this->belongsTo('App\Models\DocumenType');
    }
    public function getResourceUrlAttribute() {
        return url('/admin/applicantDocument/'.$this->getKey());
    }
}
