<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = ['first_name','last_name','keywords','resume'];

    protected $table = 'peoples';
}
