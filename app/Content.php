<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = "contents";
    protected $fillable = ['id','title','content','status','display_number'];

}
