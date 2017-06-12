<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Instagram;

class Image extends Model
{
    protected $table = 'MST_IMAGE';

    public function insta(){
        return $this->hasOne("App\\Model\\Instagram","id","instagram_id");
    }
}
