<?php
namespace App\Http;

class Flash{


public function info($title,$message) // metoda za ispis info poruke
{
	return $this->create($title,$message,'info');
}	
public function create($title,$message,$level,$key='flash_message')// glavna metoda create u kojoj se definiraju:
{
	session()->flash($key,[ // parametri se salju u view flash.blade.php
		'title' =>$title, // naziv npr. Čestitamo
		'message'=>$message, // pruka npr. uspjesno ste se logirali
		'level' =>$level // imamo 4 success,warning, info, error

		]);
}
public function success($title,$message) //uspjesnost
{
	return $this->create($title,$message,'success');
}

public function error($title,$message)//pogreska
{
	return $this->create($title,$message,'error');
}

public function warning($title,$message)//upozorenje
{
	return $this->create($title,$message,'warning');
}

public function overlay($title,$message) // ode imamo overlay koji nam sluzi da flash bude sa timerom, ne s ok botunom
{
	return $this->create($title,$message,'success','flash_message_overlay');
}

public function delete()
{
	return $this->create('jeste sigurni','zelite','warning','flash_delete');
}


}