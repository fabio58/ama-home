<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $state_id
 * @property integer $city_id
 * @property integer $education_level
 * @property integer $parent_applicant
 * @property integer $applicant_relationship
 * @property string $names
 * @property string $last_names
 * @property string $birthdate
 * @property string $gender
 * @property string $government_id
 * @property string $marital_status
 * @property boolean $pregnant
 * @property integer $pregnancy_due_date
 * @property string $cadaster
 * @property string $property_id
 * @property string $occupation
 * @property float $monthly_income
 * @property State $state
 * @property City $city
 * @property EducationLevel $educationLevel
 * @property ApplicantRelationship $applicantRelationship
 * @property Applicant $applicant
 * @property ApplicantContactMethod[] $applicantContactMethods
 * @property ApplicantDisability[] $applicantDisabilities
 * @property ApplicantDisease[] $applicantDiseases
 * @property ApplicantQuestionnaire[] $applicantQuestionnaires
 * @property ApplicantStatus[] $applicantStatuses
 */
class Applicant extends Model
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
    protected $fillable = ['state_id', 'city_id', 'education_level', 'parent_applicant', 'applicant_relationship', 'names', 'last_names', 'birthdate', 'gender', 'government_id', 'marital_status', 'pregnant', 'pregnancy_due_date', 'cadaster', 'property_id', 'occupation', 'monthly_income'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function educationLevel()
    {
        return $this->belongsTo('App\Models\EducationLevel', 'education_level');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function applicantRelationship()
    {
        return $this->belongsTo('App\Models\ApplicantRelationship', 'applicant_relationship');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function applicant()
    {
        return $this->belongsTo('App\Models\Applicant', 'parent_applicant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applicantContactMethods()
    {
        return $this->hasMany('App\Models\ApplicantContactMethod');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applicantDisabilities()
    {
        return $this->hasMany('App\Models\ApplicantDisability');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applicantDiseases()
    {
        return $this->hasMany('App\Models\ApplicantDisease');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applicantQuestionnaires()
    {
        return $this->hasMany('App\Models\ApplicantQuestionnaire');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applicantStatuses()
    {
        return $this->hasMany('App\Models\ApplicantStatus');
    }

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/view-perfiles-empresas/'.$this->getKey());
    }

}
