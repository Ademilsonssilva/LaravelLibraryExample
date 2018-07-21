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

    public function getStatusBootstrapClass ()
    {
        switch ($this->getStatus()) {
            case 'OPEN':
                return 'info';
                break;
            case 'LATE':
                return 'warning';
                break;
            case 'RETURNED':
                return 'success';
                break;
            case 'RETURNED LATE':
                return 'danger';
                break;
        }
    }

    public function getForecastDate()
    {
        return Carbon::parse($this->lend_date)->addDays($this->days);
    }

    public function getDevolutionDate($formated = true)
    {
        if ($this->devolution_date != '') {
            return $formated ? $this->devolution_date->format('d/m/Y') : $this->devolution_date;
        }
        else {
            return $formated ? 'PENDING' : null;
        }
    }

    public static function orderLendsByDate ($lends)
    {
        $dates_array = [];
        foreach ($lends as $lend) {
            $dates_array[$lend->lend_date->format('d/m/Y')][] = $lend;
        }

        return $dates_array;
    }
}
