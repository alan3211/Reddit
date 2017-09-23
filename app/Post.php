<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class Post extends Model{
    protected $table = "posts";

    protected $fillable = ['titulo','cuerpo','url']; 

    public function user(){
    	return $this->belongsTo(User::class);
    }

}
