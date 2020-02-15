<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $state_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property State $state
 * @property Applicant[] $applicants
 */
class City extends Model
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
    protected $fillable = ['state_id', 'name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applicants()
    {
        return $this->hasMany('App\Models\Applicant');
    }

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/cities/'.$this->getKey());
    }

}
