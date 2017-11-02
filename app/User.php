<?php

namespace App;

use App\Apartment;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 
        'password','date_of_birth','birth_country',
        'birth_city','user_address','user_phone',
        'gender','user_decription',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [// nije mass assignable
        'password', 'remember_token',
    ];
    /**
     * Jedan korisnik moze imati mnogo oglasa
     */
    public function apartments()
    {
        return $this->hasMany('App\Apartment');
    }
    /**
     * metoda publish pomocu koje se oglasu dodjeljuje id korisnika
     */
    public function publish(Apartment $apartment)
    {
        $this->apartments()->save($apartment);// metoda save za spremanje oglasa u bazu
    }
    /**
     * Jedan oglas moze imati mnogo komentara
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    /**
     * metoda publish pomocu koje se komentaru dodjeljuje id korisnika
     */
    public function publish_comment(Comment $comment)
    {
        $this->comments()->save($comment);//spremanje komentara u bazu
    }
}
