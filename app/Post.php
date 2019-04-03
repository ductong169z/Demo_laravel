<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $id)
 */
class Post extends Model
{
    //
    protected $table='posts';
    public $primaryKey='id';
    public $timestamps=true;
    public function childs(){
        return $this->hasMany('App\Categories','cate_id');
    }



}
