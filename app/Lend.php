<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lend extends Model
{
    
    public $fillable = ['user_id', 'book_id', 'days', 'lend_date'];
    
    
}
