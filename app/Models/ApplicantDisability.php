<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $applicant_id
 * @property integer $disability_id
 * @property string $created_at
 * @property string $updated_at
 * @property Disability $disability
 * @property Applicant $applicant
 */
class ApplicantDisability extends Model
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
    protected $fillable = ['applicant_id', 'disability_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function disability()
    {
        return $this->belongsTo('App\Models\Disability');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function applicant()
    {
        return $this->belongsTo('App\Models\Applicant');
    }
}
