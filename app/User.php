<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable  = ['name', 'email'];

    public function lends()
    {
    	return $this->hasMany('Lend');
    }

    public static function getUserComboFormat()
    {
    	$users = User::all();

    	$array = [];
    	foreach ($users as $user) {
    		$r = ['id' => $user->id, 'value' => $user->name];
    		$array[] = $r;
    	}

    	return $array;
    }
}
