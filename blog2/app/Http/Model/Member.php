<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table= 'member';
    public $timestamps= false;
    protected $guarded= ['_token'];
}
