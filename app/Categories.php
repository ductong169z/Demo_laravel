<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table='categories';
    public $primaryKey='id';
    protected $fillable = ['name','img'];
    public $timestamps=true;

}
