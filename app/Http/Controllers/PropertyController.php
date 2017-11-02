<?php

namespace App\Http\Controllers;
use App\Apartment;
use App\Comment;
use App\Http\Requests;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PropertyController extends Controller
{
    /*provjeravam da li je korisnik logiran, 
    ako je, pristup svim metodama je dozvoljen osim onih koje se nalaze unutar "except".Tim funkcijama 
    je pristup dozvoljn svima.
    */
    public function __construct ()
    {
            $this->middleware('auth',['except' => [
                'all_propertys',
                'view_property',
                'search_all_propertys',
                'show_contact'
            ]]);
    }

    /**
     * Klikom na new property poziva se ova metoda koja nam vraca view za kreiranje novog oglasa
     *
     */
    public function index()
    {
        return view('user.new_property');
    }
    /**
     * Prikazivanje contact view-a
     */
    public function show_contact()
    {
        return view('all.contact');
    }
    /**
     * Ova metoda sprema novo kreirani oglas u bazu podataka.
     *
     */
    public function store(Request $request)
    {
        //poziva se property_validation u kojoj validiramo dobivene podatke, koje
        //ispunjavamo prilikom kreiranja novog oglasa
        //ako je validacija uspješna kreiram novu istancu tipa Apartment, te spremam dobivene podatke
        //(iz nekog razloga ne se spremiti property_title i house size pa to radim odvojeno)
        /*nakon sto smo spremili sve podatke u $apartment, za logiranog korisnika pozivamo metodu publish koja
        se nalazi u modelu User te proslijedjujemo  $apartment te na taj nacin daljnim koracima koji su 
        objašnjeni u modelu spremamo 
        podatke u bazu
        */
        /* na kraju pozivamo funkciju redirect pomocu koje idemo dalje na dodavanje slika
        /*apartment_id proslijedujemo da se zna na koji oglas dodajemo slike
        */

        $this->property_validation($request);
        $apartment=new Apartment($request->all());
        $apartment->property_title=$request->property_title;
        $apartment->house_size=$request->house_size;
        Auth::user()->publish($apartment);
        return redirect('/property/'.$apartment->id);
    }
    /**
     * Ovdje sam kreirao funkciju property_validation koja se poziva u funkciji store i update, u kojoj se validira oglas.
     */
    protected function property_validation($request)
    {

        return $this->validate($request,[
        'property_title'=>'required|max:30',
        'check_in'=>'required|between:0,24|integer',
        'check_out'=>'required|between:0,24|integer',
        'number_of_bedrooms'=>'required|between:0,10|integer',
        'house_size'=>'required|integer',
        'number_of_bathrooms'=>'required|between:0,10|integer',
        'number_of_people'=>'required|between:0,20|integer',
        'bed_for_one_number'=>'required|between:0,20|integer',
        'bed_for_two_number'=>'required|between:0,20|integer',
        'children_bed_number'=>'required|between:0,20|integer',
        'deposit'=>'max:10',
        'apartment_city'=>'required|max:50',
        'apartment_zip'=>'required|max:50',
        'apartment_address'=>'required|max:50',
        'apartment_province'=>'required|max:50',
        'bed_linen'=>'boolean',
        'gym'=>'boolean',
        'elevator'=>'boolean',
        'balcony'=>'boolean',
        'smoking'=>'boolean',
        'pets'=>'boolean',
        'towels'=>'boolean',
        'parking'=>'boolean',
        'air_conditioning'=>'boolean',
        'washing_machine'=>'boolean',
        'wheel_chair'=>'boolean',
        'pool'=>'boolean',
        'price_per_night'=>'required|max:10',
        'weekly_price'=>'max:10',
        'monthly_price'=>'max:10',
        ]);
    }

    /**
     * Pomocu ove metode prikazujemo view za dodavanje slika
     *
     */
    public function show($id)
    {
        // trazimo u bazi apartman na koji cemo dodati slike na temelju dobivenog id-a
        $apartment= Apartment::where(compact('id'))->first();
        return view('user.property_images',compact('apartment'));
    }


    /**
     * Metoda za pomocu koje spremamo slike u bazu
     */

    public function addPhotos($id,Request $request)
    {
        //trazimo apartman na temelju id-a uz kojeg cemo vezati dodanu sliku, iz razloga da provjerimo je li vlasnik 
        //oglasa dodaje slike vezane za apartman 
        //provjeravamo je li logirani korisnik vlasnik filtriranog oglasa. Ako nije vracamo korisnika na
        //pocetnu stranicu.
        //provjeravamo je li pri pozivu funkcije zaista dodana slika
        $apartment= Apartment::where(compact('id'))->first();
        $photos_number=Photo::where('apartment_id',$apartment->id)->count();
        if($photos_number >= 12){
            return redirect()->back();
        }
        if ($apartment->user_id != Auth::id()) {
            return redirect('/');
        }
        $this->validate($request,[
            'file'=> 'required'
        ]);
        //pozivamo funkciju make photo pomocu koje cemo u $ photo  spremiti sve potrebne podatke za spremanje slike u bazu
        $photo=$this->makePhoto($request->file('file')); 
        //pozivamo funkciju addPhotos koja u klasi Apartment sprema slike uz id odgovarajućaeg oglasa  
        $apartment->addPhotos($photo);
    }
    /**
     * Make photo
     */
 
    protected function makePhoto(UploadedFile $file)
    {
        // prvo pozivamo metodu named koja nam vraca instancu klase $photo sa dodjeljenim joj vrijednostima ,
        // nakon toga pozivamo metodu move koja premjesta sliku u pripadajuci folder
        //te  pomocu intervention biblioteke cropa, scala i pravi thumnail
        return Photo::named($file->getClientOriginalName())
                     ->move($file);
    }

    /**
     * Mezoda za prikazivanje svih apartmana
     */
    public function all_propertys()
    {
        $apartments=Apartment::all(); // dohvaćanje svih iz baze
        return view('user.all_propertys',compact('apartments',$apartments));// slanje u view dohvaćenih  podataka
    }

    /**
     *  Metoda za prikazivanje rezultata unosom naziva grada i broja ljudi na home viev-u. 
     */
    public function search_all_propertys(Request $request)
    {
        // ako nismo unijeli maksimalan broj ljudi pretragu u bazi vrsimo samo po nazivu grada
        if ($request->people_search == null && $request->city_search != null) {
            $apartments=Apartment::where('apartment_city',$request->city_search)->get();
        //ako smo unjeli broj ljudi i naziv grada pretragu u bazi vrsimo po nazivu i broju ljudi    
        }elseif($request->people_search != null && $request->city_search != null){
            $apartments=Apartment::where('apartment_city',$request->city_search)
            ->where('number_of_people','>=',$request->people_search)
            ->get();      
        }else{ // u ostalim slucajevima ne vrsimo nikakvu pretragu vec se vracamo nazad na home view
            return redirect()->back();
        }
        //dobivene rezultate saljemo u view all_propertys(svi oglasi) i tamo ih prikazujemo
        return view('user.all_propertys',compact('apartments',$apartments));
    }
    /**
     * Metoda za prikaz zeljenog oglasa prilikom klika
     */
    public function view_property($id)
    {   
        // dohvaćamo apartman na temelju dobivenog parametra $id-a
        $apartment=Apartment::where(compact('id'))->first();
        //dohvaćamo korisnika koji je kreirao apartman
        $user=User::where('id',$apartment->user_id)->first();
        //dohvaćamo komentare vezane za apartman
        $comments=Comment::where('apartment_id',$apartment->id);
        //dohvaćamo sve korisnike
        $allusers=User::all();
        //sve saljemo u view te prikazujemo u view-u view_property
        return view('all.view_property')->with([
            'apartment'=>$apartment, 
            'user' => $user,
            'comments'=>$comments,
            'allusers'=>$allusers
            ]);

    }
    /**
     * Metoda za dodavanje komentara u bazu vezenog za pojedini oglas
     */
    public function addComment($id,Request $request)
    {
        if($request->comment == ""){
            return redirect()->back();
        }
        //dohvaćamo oglas na temelju dobivenog $id-a
        $apartment=Apartment::where(compact('id'))->first();
        //instanciramo new_coment tipa Comment
        $new_comment=new Comment;
        //spremamo dobivene podatke
        $new_comment->comment=$request->comment;
        $new_comment->apartment_id=$apartment->id;
        //za logiranog korisnika koji je objavio komentar, pomocu metode publish_comment koja se nalazi u modelu
        //User dodajemo novi komentar u bazu vezan za oglas
        Auth::user()->publish_comment($new_comment);
        //vracanje nazad
        return redirect()->back();
      
    }
    /**
     * Metoda promocu koje prikazujemo sve oglase pojedinog logiranog korisnika
     */
    public function all_user_propertys()
    {
        //vrsimo pretragu apartmana u kojima je id korisnika koji ga je kreirao jednak onom logiranog korisnika
        $apartments=Apartment::where('user_id',Auth::id())->get();
        //saljemo filtrirane podatke u view
        return view('user.all_user_propertys',compact('apartments',$apartments));
    }
    /**
     * Prikaz forme za editiranje oglasa
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dohvacamo zeljeni oglas na temelju id-a
        $apartment=Apartment::where(compact('id'))->first();
        //provjeravamo je li id logiranog korisnika jednak onom koji je kreirao oglas, ako je ima dozvolu
        //za editiranje oglasa, ako ne vracamo ga nazad na prikaz njegovih oglasa ako ih ima 
        if(Auth::id() == $apartment->user_id){
        return view('user.edit_apartment',compact('apartment',$apartment));
        }else{
        return redirect('/property/apartments');
    }

    }

    /**
     * Metoda pomocu koje se promijenjeno podatci azuriraju u bazi
     *
     */
    public function update(Request $request, $id)
    {
        // ponovo vrsimo validaciju kao i kod store metode
        $this->property_validation($request);
        // trazimo apartman kojeg zelimo azurirati po id-u, zatim azuriramo sve podatke u $apartment
        $apartment=Apartment::where(compact('id'))->first();
        //provjeravam je li logirani korisnik vlasnik oglasa
        if(Auth::id() != $apartment->user_id){
            return redirect('/property/apartments');
        }
        $apartment->property_title=$request->property_title;
        $apartment->house_size=$request->house_size;
        //pozivamo metodu update pomocu koje azuriramo podatke u bazi
        $apartment->update($request->all());
        //klikom na botun nastavak dalje- nastavljamo na mogucnost editiranje slika(botun ima value 0)
        if ($request->edit_pictures_property =='0') {
            return redirect('/property/'.$apartment->id);
        }else{ // klikom na botun zavrsetak zavrsavamo s editiranjem i vracamo se na prikaz svih apartmana
             return redirect('/property/all_apartments');
        }
        

    }

    /**
     * Metoda pomocu koje brisemo oglas iz baze
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dohvacamo oglas pomocu id-a
        $apartment=Apartment::where(compact('id'))->first();
        //provjereavam je li logirani korisnik vlasnik oglasa
        if (Auth::id() != $apartment->user_id) {
            return redirect()->back();
        }
        //brisemo ga metodom delete, posto sam u tablici comments stavio kaskadno brisanje, 
        //izbrisat ce se i komentari vezani za oglas
        $apartment->delete();
        //povratak nazad na prikaz svih apartmana
        return redirect()->back();
    }
    /**
     * Metoda za brisanje slika
     */
    public function deletePhotos($id)
    {
        //trazim fotografiju u bazi brema parametru $id
        $photo=Photo::where(compact('id'))->first();
        //trazimo apartman za koji su vezane slike
        $apartment=Apartment::where('id',$photo->apartment_id)->first();
        //provjeravamo je li logirani korisnik ovlašten brisati slike
        if(Auth::id() != $apartment->user_id){
           return redirect('/property/apartments');
        } 
        //pozivam funkciju delete koju smo pregazili   u modelu Photo za brisanje slike
        $photo->delete();
        return redirect()->back();
    }
}
