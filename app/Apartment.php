<?php

namespace App;

use App\Photo;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
	
    protected $fillable =[
    'monthly_price','check_in','check_out','number_of_bedrooms','number_of_bathrooms',
    'number_of_people','bed_for_one_number','bed_for_two_number','children_bed_number',
    'deposit','property_description','apartment_city','apartment_zip','apartment_address',
    'apartment_province','internet','wireless','cable_tv','kitchen','bed_linen','gym',
    'elevator','balcony','smoking','pets','towels','parking','air_conditioning','washing_machine',
    'wheel_chair','pool','price_per_night','weekly_price','monthly_price'

    ];
    /**
     * Aprtman ima mnogo slika
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
    	return $this->hasMany('App\Photo');
    }
    /**
     * Spremanje slike u bazu pod odgovarajući id-om oglasa
     */
    public function addPhotos(Photo $photo)
    {
        return $this->photos()->save($photo);
    }
    /**
     * Svaki apartman pripada određenom korisniku
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    /**
     * Jedan apratman moze imati mnogo komentara
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
