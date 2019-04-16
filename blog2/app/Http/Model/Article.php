<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table= 'article';
    protected $guarded= ['_token','source'];

    public $timestamps= false;
    protected $primaryKey= 'art_id';
}
