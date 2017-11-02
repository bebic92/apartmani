<?php
/**
 * Globalna(autoload.json) helper metoda za ispisivanje flash poruka
 */
function flash($title=null,$message=null)
{
	$flash = app('App\Http\Flash'); //instnciramo
	if(func_num_args() == 0){//ako nema argumenata vracamo instancu
		return $flash;
	}
	return $flash->info($title,$message);//ako ima pozivamo info metodu s proslijedenim parametrima
}