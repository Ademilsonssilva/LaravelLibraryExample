<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	
	protected $fillable = ["name", "author", "synopsis", "quantity", "limited"];

    public function lends()
    {
    	return $this->hasMany('\App\Lend');
    }

    public function isAvaliable()
    {
    	return $this->getAvaliable() > 0;
    }

    public function getAvaliable()
    {
        return $this->quantity - Lend::where('book_id', $this->id)
            ->whereNull('devolution_date')->count();
    }
}
