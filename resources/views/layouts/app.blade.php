<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Marin-apartmani</title>

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  {{-- check box ikonice --}}
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/font-awesome.css"> 
{{--    KRAJ --}}
   <link rel="stylesheet" href="/css/bootstrap.css"/>
  <link rel="stylesheet" href="/css/build.css"/>  
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">  
  <link rel="stylesheet"  href="/css/libs.css">
   <link rel="stylesheet"  href="/css/app.css">
   {{-- MARIN STYLE --}}
   <link rel="stylesheet"  href="/css/marin-general-style.css">
   <link rel="stylesheet"  href="/css/marin-property-style.css">
   <link rel="stylesheet"  href="/css/marin-add_images-style.css">
   <link href="/css/login-marin-style.css" rel="stylesheet">
  {{-- CITY AUTOCOMPLETE --}}
  <link rel="stylesheet" href="/css/city-autocomplete.css">
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&language=en"></script>
  {{-- CALENDAR --}}
  <link href="/css/dcalendar.picker.css" rel="stylesheet">
 {{-- dropzone --}}
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
  </head>
  <body class="mb-white-bg">
    <!-- Header -->
    <div class="mb-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-3 mb-site-name-container">
            <a href="/" class="mb-site-name">Apartmani</a>    
          </div> 
          @if (Auth::guest()) {{-- AKO JE KORISNIK GOST POKAZI SLJEDECE LINKOVE --}}
          <div class="col-lg-8 col-md-8 col-sm-9">
            <div class="mobile-menu-icon">
              <i class="fa fa-bars"></i>
            </div>
            <nav class="mb-nav navbar-right" >
              <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/property/all_apartments">Svi oglasi</a></li>
                <li><a href="/contact">Kontakt</a></li>

                <div class="mb-nav-reg-btn btn btn-warning">
                  <li><a href="{{ url('/login') }}">Prijava</a></li>
                </div>
                <div class="mb-nav-reg-btn btn btn-primary">
                  <li><a href="{{ url('/register') }}">Registracija</a></li>
                </div>
              </ul>
            </nav>
          </div>
          @else {{-- AKO JE KORISNIK LOGIRAN POKAZI SLJEDECE LINKOVE I PADAJUCU LISTU ZA KORISNIKA --}}
          <div class="col-lg-7 col-md-7 col-sm-8">
            <nav class="mb-nav navbar-right">
              <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/user">Profil</a></li>
                <li><a href="/property">Predaj oglas</a></li>             
                <li><a href="/property/all_apartments">Svi oglasi</a></li>
              </ul>
            </nav>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-1">
            <ul class="nav navbar-right btn btn-danger">
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->first_name}}
                <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="navbar-content">
                      <div class="row">
                        <div class="col-md-5">
                          <img src="/../img/profile-img.png" style="width:120;height:120px" />
                     

                        </div>
                        <div class="col-md-7">
                          <span class="text-muted">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                          <p class="text-muted small">
                           {{Auth::user()->email}}</p>
                           <div class="divider">
                           </div>
                           <a href="/user" class="btn btn-primary btn-sm active">Pogledaj profil</a>
                         </div>
                       </div>
                     </div>
                     <br>
                     <div class="navbar-footer">
                      <div class="navbar-footer-content">
                        <div class="row">
                          <div class="col-md-6">
                            <a href="/logout" class="btn btn-danger btn pull-left">Odjava</a>
                          </div>
                          <div class="col-md-6">
                            <a href="/property/apartments" class="btn btn-success btn pull-right">Moji oglasi</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>  
          @endif
        </div>
      </div>      
    </div>

@yield('content') {{-- POZIVANJEM  section U OSTALIM VIEW-IMA ODE CE NAM ICI TAJ SADRZAJ, ZATO KORISTIMO YIELD --}} 
  <section id="footer-sec" >
  <br>  <br>
    <div class="container">
     <div class="row  pad-bottom" >
      <div class="col-md-4">
        <h4> <strong>O APARTMANIMA</strong> </h4>
        <p>
         Apartmani su mjesto gdje vrlo jednostavno možete, oglasiti vaš apartman
         kao i vrlo lako pronaći apartman za  stanovanje ili odmor.
       </p>
     </div>
     <div class="col-md-4">
      <h4> <strong>Društvene mreže</strong> </h4>
      <p>
       <a href="#"><i class="fa fa-facebook-square fa-3x"  ></i></a>  
       <a href="#"><i class="fa fa-twitter-square fa-3x"  ></i></a>  
       <a href="#"><i class="fa fa-linkedin-square fa-3x"  ></i></a>  
       <a href="#"><i class="fa fa-google-plus-square fa-3x"  ></i></a>  
     </p>
   </div>
   <div class="col-md-4">
     <h4> <strong>Naša lokacija</strong> </h4>
     <p>
       Muć , Gornji Muć, <br />
       Bebići 32  <br />
       Splitsko-dalmatinska županija<br />
     </p>
     <br>
     <a href="/contact" class="btn btn-warning" >PRONAĐI NAS</a>
   </div>
  </div>
  <hr>
  <div class="row">
    <p class="mb-copyright-text">Copyright &copy; Marin Bebić 

      | Dizajn napravio Marin Bebić</p>
    </div>
  </div>
  </section>  

@yield('script.footer')
<script src="/js/libs.js"></script>
@include('messages.flash')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


<script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>              <!-- jQuery -->
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>                  <!-- bootstrap js -->
    <script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>   

{{-- marin search bar --}}
    <script src="//<a href="http://www.jqueryscript.net/tags.php?/map/">map</a>s.googleapis.com/maps/api/js?libraries=places"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="/js/jquery.city-autocomplete.js"></script>
    <script>
    $('input#city').cityAutocomplete();
    </script>
{{--   marin calendar --}}
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/dcalendar.picker.js"></script>
<script>
$('#start').dcalendarpicker();
$('#calendar-demo').dcalendar(); //creates the calendar
</script>
<script>
$('#end').dcalendarpicker();
$('#calendar-demo').dcalendar(); //creates the calendar
</script>
<script src="/js/lightbox.js"></script>
{{-- MARIN OPCIJE ZA LIGHTBOX --}}
<script>
    lightbox.option({
      'albumLabel': "Slika %1 od %2",
    })
</script>
