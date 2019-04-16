<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Comm extends Model
{
    protected $table= 'comm';
    protected $guarded= ['_token'];
    public $timestamps= false;

}
