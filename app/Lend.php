<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lend extends Model
{
    
    public $fillable = ['user_id', 'book_id', 'days', 'lend_date'];
    public $dates = ['lend_date', 'devolution_date'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    public function getStatus()
    {
    	if ($this->devolution_date != '') {
            if (Carbon::parse($this->devolution_date) > Carbon::parse($this->lend_date)->addDays($this->days)) {
                return 'RETURNED LATE';
            }
    		else {
                return 'RETURNED';
            }
    	}
    	else {
	    	if (Carbon::now() > Carbon::parse($this->lend_date)->addDays($this->days)) {
	    		return 'LATE';
	    	}
	    	else {
	    		return 'OPEN';
	    	}
    	}
    }

    public function getForecastDate()
    {
        return Carbon::parse($this->lend_date)->addDays($this->days);
    }
}
