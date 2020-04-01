<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/*
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class Nationality extends Model
{
    protected $keyType = 'integer';
    protected $fillable = ['name', 'created_at', 'updated_at'];

    public function applicants()
    {
        return $this->hasMany('App\Models\Applicant');
    }

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/nacionlities/'.$this->getKey());
    }
}
