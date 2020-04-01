<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
/*
* @property integer $applicant_id
* @property integer $document_id
*/
class ApplicantDocument extends Model implements HasMedia 
{

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;  
    use HasMediaThumbsTrait;
    protected $keyType = 'integer';
    
    protected $fillable = [
        'applicant_id',
        'document_id'
    ];
     
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
    protected $appends = ['resource_url'];

    public function registerMediaCollections() {
        $this->addMediaCollection('social')
            ->disk('media') // Set the file count limit
            ->maxNumberOfFiles(1);
            //->addRemoveLinks(false); // Set the file count limit
    }
      /**
     * Get url of avatar image
     *
     * @return string|null
     */






    public function applicant()
    {
        return $this->belongsTo('App\Models\Applicant', 'applicant_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function DocumentType()
    {
        return $this->belongsTo('App\Models\DocumentType', 'document_id');
    }
 

 
    // public function Media()
    // {
    //     return $this->belongsTo('App\Models\Media', 'model_id');
    // }
 
    /* ************************ ACCESSOR ************************* */
 
    public function getResourceUrlAttribute()
    {
        return url('/admin/applicant-documents/'.$this->getKey());
    }

}
