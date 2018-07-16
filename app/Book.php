<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	
	protected $fillable = ["name", "author", "synopsis", "quantity", "limited"];

    public function lends()
    {
    	return $this->hasMany('Lend');
    }
}
