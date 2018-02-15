<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    //protected $fillable = ["title", "body"]; // tells what is allowed through
    protected $guarded = []; // tells what isn't allowed through
    
}
