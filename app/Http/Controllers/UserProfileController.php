<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{

    public function __construct ()
    {
            $this->middleware('auth');//samo za logirane korisnike se pozivaju ove metode
    }


    /**
     * Metoda za prikazivanje profila logiranog korisnika
     *
     */
    public function index()
    {
        //Ako korisnik nije logiran vracamo ga na home, ako je idemo na njegov profil
        if(Auth::user()){
            $user=Auth::user();
            return view('user.profile',compact('user',$user));
        }

        return redirect('/');
    }

    /**
     * Funkcija pomocu koje mozemo azurirati podatke koje smo unijeli prilikom registracije, 
     *kao i dodati neke nove
     *
     */
    public function store(Request $request)
    {
        if ($request->email != Auth::user()->email) { //ako između ostalog mijenjamo mail onda provjeravamo 
                                                      //je li jedinstven u bazi
            $this->validate_with_mail($request);

      }elseif ($request->email == Auth::user()->email) {// ako nismo mjenjali mail onda to ne provjeravamo, jer 
                                                        // mail ce vec postojat u bazi te ce nam vratit gresku, 
                                                        //te onda necemo moci promijeniti ili spremiti ostale podatke
            $this->validate_without_mail($request);
      }    
   //za logiranog korisnika spremamo dobivene podatke u $user
        $user=Auth::user();
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->date_of_birth=$request->date_of_birth;
        $user->birth_country=$request->birth_country;
        $user->birth_city=$request->birth_city;
        $user->user_address=$request->user_address;
        $user->user_address=$request->user_address;
        $user->user_phone=$request->user_phone;
        $user->description=$request->description;
        $user->gender=$request->gender;
        if($request->password != ''){ //ako smo mijenjali lozinku(moramo je kriptirati) , ako ne ostavi staro
        $user->password=bcrypt($request->password);
        }
        //spremamo u bazi
        $user->save();
        //povratak nazad na profil
        return redirect()->back();
    
  
    }
        public function validate_without_mail($request)
        {
            $this->validate($request,[
            'first_name' => 'required|max:255',
            'last_name' =>'required|max:255',           
            'password' => 'min:6|confirmed',// confirmed-provjera je li ponovno unesena nova lozinka jednaka novoj lozinci
            'date_of_birth' =>'sometimes|date',//sometimes-vrsimo validaciju samo ako je input prisutan
            'birth_country' =>'max:30',
            'birth_city' =>'max:30',
            'user_address' => 'max:255',
            'user_phone' => 'max:30',
            
        ]);
        }
        public function validate_with_mail($request)
        {
            $this->validate($request,[
            'first_name' => 'required|max:255',
            'last_name' =>'required|max:255',           
            'email' => 'required|email|max:255|unique:users', //unique- reba biti jednistveno u bazi
            'password' => 'min:6|confirmed',
            'date_of_birth' =>'date',
            'birth_country' =>'max:30',
            'birth_city' =>'max:30',
            'user_address' => 'max:255',
            'user_phone' => 'max:30',
        ]);
        }

}
