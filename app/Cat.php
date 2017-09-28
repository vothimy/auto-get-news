<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id_cat';
}
