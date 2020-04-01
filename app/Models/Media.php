<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
* @property integer $model_id

*/
class Media extends Model
{
    protected $table = 'media';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';

    public function Media()
    {
        return $this->hasmany('App\Models\Media', 'model_id');
    }

    public function ApplicantDocument()
    {
        return $this->belongsTo('App\Models\ApplicantDocument' , 'model_id');
    }
 
}
