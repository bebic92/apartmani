<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['comment']; 
	/**
 	*  komentar pripada odredenom apartmanu
 	*/
    public function apartment()
    {
    	$this->belongsTo('App\Apartment');
    }
    /**
     *  komentar pripada odredenom korisniku
     */
    public function user()
    {
    	$this->belongsTo('App\User');
    }
}
