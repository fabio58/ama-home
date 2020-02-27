<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;





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
class Applicant extends Model implements HasMedia 
{

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;  
    
    use HasMediaThumbsTrait;
   
    
    

    protected $keyType = 'integer';
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    public function registerMediaCollections() {
        $this->addMediaCollection('documents')
            ->maxNumberOfFiles(20); // Set the file count limit
            //->addRemoveLinks(false); // Set the file count limit
    }
      /**
     * Get url of avatar image
     *
     * @return string|null
     */
    public function getAvatarThumbUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('avatar', 'thumb_150') ?: null;
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->autoRegisterThumb200();

        $this->addMediaConversion('thumb_75')
            ->width(75)
            ->height(75)
            ->fit('crop', 75, 75)
            ->optimize()
            ->performOnCollections('avatar')
            ->nonQueued();

        $this->addMediaConversion('thumb_150')
            ->width(150)
            ->height(150)
            ->fit('crop', 150, 150)
            ->optimize()
            ->performOnCollections('avatar')
            ->nonQueued();
    }

    /**
     * Auto register thumb overridden
     */
    public function autoRegisterThumb200()
    {
        $this->getMediaCollections()->filter->isImage()->each(function ($mediaCollection) {
            $this->addMediaConversion('thumb_200')
                ->width(200)
                ->height(200)
                ->fit('crop', 200, 200)
                ->optimize()
                ->performOnCollections($mediaCollection->getName())
                ->nonQueued();
        });
    }
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
        return url('/admin/applicants/'.$this->getKey());
    }

}
