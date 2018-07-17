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

    public static function getBookComboFormat()
    {
    	$books = Book::all();

    	$array = [];
    	foreach ($books as $book) {
    		$r = ['id' => $book->id, 'value' => $book->author . " - " . $book->name];
    		$array[] = $r;
    	}

    	return $array;
    }
}
