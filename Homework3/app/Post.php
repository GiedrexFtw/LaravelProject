<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table Name
    protected $table='posts';
    //Primary key
    public $primaryKey='id';
    //timestamps
    public $timestamps=false;

}
