<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Image;
use Intervention\Image\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
class Photo extends Model
{

	protected $table ='photos_apartment';
	protected $baseDir='apartment/photos';
	protected $fillable=[
		'photo_name',
		'photo_path',
		'thumbnail_path'
	];
	/**
	 * Slike pripadaju apartmanu
	 *
	 */
	public function apartment()
	{
    	return $this->belongsTo('App\Apartment');	
	}
	/**
	 * Funkcija za spremanje potrebnih podataka u $photo
	 */
	public static function named($name)
	{
		$photo=new static; // $photo deklariram kao new static tako da u metodi saveAs mogu pomocu $this dati vrijednosti
		// poljima
		return $photo->saveAs($name);
	}
	public function saveAs($name)
	{
		//ime slike spremamo u $this->photo-name, koristimo time() da omogućimo jedinstveni naziv slike, sprintf()
        // za dodavanje - , i getClientOriginalName(koji metoda prima pomocu parametra $name) 
        //za dohvaćanje naziva dodane slike. (za dodavanje slike
        // koristim dropzone.js a opcije definiramo u view-u)
        //definiramo putanje u kojoj ce se nalaziti slike
        //definiramo putanje u kojoj ce se nalaziti thumbnailsi dodajemo tn-
		$this->photo_name= sprintf("%s-%s",time(),$name);
        $this->photo_path=sprintf("%s/%s",$this->baseDir,$this->photo_name);
        $this->thumbnail_path=sprintf("%s/tn-%s",$this->baseDir,$this->photo_name);
        return $this;
	}
	public function move(Uploadedfile $file)
	{
		//premjestanje slike u pripadajuci folder pomocu metode move
		$file->move($this->baseDir,$this->photo_name);	
        //kreiramo thumnail od dodane slike pomoću biblioteke intervention library koja je podrzana
        // u laravelu.Dodao sam samo Image fasadu(nalazi se u app\config)
        Image::make($this->photo_path)
            ->fit(250,150)      //metoda fit automatski resiza, crop-a, scale-a sliku ,
            ->save($this->thumbnail_path); // metoda save sprema sliku u po thumbnail putanji
            return $this;
	}
	public function delete()
	{
		//pmocu fasade File koja dolazi sa intervention bibliotekom brisemo sliku i thumbnail
		$image=$this->photo_path;
        $thumbnail=$this->thumbnail_path;
        \File::delete([
            $image,
            $thumbnail

            ]);
		parent::delete(); //gazimo delete funkciju koja dode s laravelom
	}
}
