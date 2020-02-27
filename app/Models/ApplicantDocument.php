<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantDocument extends Model
{
    protected $fillable = [
        'applicant_id',
        'document_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];
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
    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/applicant-documents/'.$this->getKey());
    }
}
