<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * 
 */
class DocumentType extends Model
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
    protected $fillable = ['id','name', 'enabled', 'type', 'created_at', 'updated_at'];

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applicantDocuments()
    {
        return $this->hasOne('App\Models\ApplicantDocument', 'document_id', 'id');
    }

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/applicantDocument/'.$this->getKey());
    }
}
