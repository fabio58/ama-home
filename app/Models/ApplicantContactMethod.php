<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $applicant_id
 * @property integer $contact_method_id
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property Applicant $applicant
 * @property ContactMethod $contactMethod
 */
class ApplicantContactMethod extends Model
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
    protected $fillable = ['applicant_id', 'contact_method_id', 'description', 'created_at', 'updated_at'];

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
    public function contactMethod()
    {
        return $this->belongsTo('App\Models\ContactMethod');
    }
}
