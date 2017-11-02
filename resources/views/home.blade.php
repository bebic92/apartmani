@extends('layouts.app')
@section('content')
<!-- Banner -->
<section class="mb-banner">
  <div class="banner">
    <div class="mb-banner-inner">
      <h1 class="mb-banner-title">Pronađi <span class="mb-yellow-text">najbolje</span> mjesto</h1>
      <p class="mb-banner-subtitle">za stanovanje ili odmor</p>
      <a href="/property" class="mb-banner-link">predaj oglas</a> 
      <div class="searchbox">
        <div class="search_container">
          <form role="form" method="GET" action="/property/all_apartments_search">
            {{csrf_field()}}   
            <div class="search">        
              <div class="search_fields">
                <input id="city" name="city_search" class="form-control-large form-control-search" autocomplete="off" data-country="hr" placeholder="Grad ili mjesto u koje želite ići" type="search">
              </div>
            </div>
          </div>
          <div class="search_button">          
            <select class="form-control-large form-control-people-search" name="people_search" id="people_search">
              <option value="">Broj osoba</option>
              @for($i=0;$i <=20;$i++)       
              <option value="{{$i}}">{{$i}}</option>
              @endfor
            </select>
          </div> 
          <div class="search_button">          
           <button type="submit" class="btn btn-lg btn-info btn-size">Pretražite</button>
         </div> 
       </form>

     </div>  
   </div>
   <img src="img/banner-1.jpg" alt="Image" />  
 </div>  
</section>
{{-- PROZORCICI --}}
<section class="container windows-container" id="more">
     <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="windows-home windows-home-left">
          <h4>
           <i class="fa fa-check" style="font-size:16px;color:#34c4ef"></i>
           Jednostavnost
         </h4>
         <p>Apartmani su jednostavan način za oglašavanje</p>
         <p> i pretraživanje mjesta za odmor ili stanovanje</p>
       </div>
     </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="windows-home windows-home-center">
          <h4>
           <i class="fa fa-check" style="font-size:16px;color:#34c4ef"></i>
           Provjereni oglašivači
         </h4>
         <p>Naši oglasi su provjereni, svi sadrže osnovne informacije
          poput: broja soba, maksimalnog broja gostiju... </p>
       </div>  
     </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="windows-home windows-home-right">
         <h4>
           <i class="fa fa-check" style="font-size:16px;color:#34c4ef"></i>
           Mogućnosti prilikom oglašavanja
         </h4>
         <p>Predati oglas je vrlo jednostavno, samo se trebate registrirati
         i klikom na predaj oglas, prikazuje se veliki broj mogućnosti koje
         će pomoći pretraživačima da izaberu vaš oglas 
         </p>
       </div>
     </div>
   </div>
</div>
{{-- NAJPOPULARNIJA MJESTA --}}
<div class="section-margin-top">
  <div class="row">       
    <div class="mb-section-header">
      <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
      <div class="col-lg-6 col-md-6 col-sm-6"><h2 class="mb-section-title">Najpopularnija mjesta </h2></div>
      <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>  
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="mb-about-box-1">
        <a href="https://hr.wikipedia.org/wiki/Dubrovnik" target="_blank"><img src="img/popular-1.jpg" alt="img" class="mb-about-box-1-img"></a>
        <h3 class="mb-about-box-1-title" >Dubrovnik</h3>
        <p class="margin-bottom-15 gray-text">Dubrovnik je dugi niz godina najposjećenije turističko mjesto Hrvatskoj. Obiljue izvrsnom gastronomskom ponudom, i kulturnim znamenitostima.</p>
        <div class="gray-text">
          <a href="#" class="mb-social-icon"><i class="fa fa-twitter"></i></a>
          <a href="#" class="mb-social-icon"><i class="fa fa-facebook"></i></a>
          <a href="#" class="mb-social-icon"><i class="fa fa-pinterest"></i></a>
          <a href="#" class="mb-social-icon"><i class="fa fa-google-plus"></i></a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="mb-about-box-1">
        <a href="https://hr.wikipedia.org/wiki/Hvar" target="_blank"><img src="img/popular-2.jpg" class="mb-about-box-1-img"></a>
        <h3 class="mb-about-box-1-title">Hvar</h3>
        <p class="margin-bottom-15 gray-text">Hvar je jedno od najpopularnijih mjesta u Hrvatskoj.Obiljue mnoštvom  klubova za zabavu, bogatom gastronomskom ponudom i prelijepim plažama. 
        </p>
        <div class="gray-text">
          <a href="#" class="mb-social-icon"><i class="fa fa-twitter"></i></a>
          <a href="#" class="mb-social-icon"><i class="fa fa-facebook"></i></a>
          <a href="#" class="mb-social-icon"><i class="fa fa-pinterest"></i></a>
          <a href="#" class="mb-social-icon"><i class="fa fa-google-plus"></i></a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="mb-about-box-1">
        <a href="https://hr.wikipedia.org/wiki/Split" target="_blank"><img src="img/popular-3.jpg" alt="img" class="mb-about-box-1-img"></a>
        <h3 class="mb-about-box-1-title">Split</h3>
        <p class="margin-bottom-15 gray-text">Split je drugi najveći grad u Hrvatskoj. Nekoć tranzicijski grad, danas obiljue bogatom gastronomskom ponudom.U samom centru grada nalazi se Dioklecijanova palača.</p>
        <div class="gray-text">
          <a href="#" class="mb-social-icon"><i class="fa fa-twitter"></i></a>
          <a href="#" class="mb-social-icon"><i class="fa fa-facebook"></i></a>
          <a href="#" class="mb-social-icon"><i class="fa fa-pinterest"></i></a>
          <a href="#" class="mb-social-icon"><i class="fa fa-google-plus"></i></a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="mb-about-box-1">
        <a href="https://hr.wikipedia.org/wiki/Pula" target="_blank"><img src="img/popular-4.jpg" alt="img" class="mb-about-box-1-img"></a>
        <h3 class="mb-about-box-1-title">Pula</span></h3>
        <p class="margin-bottom-15 gray-text">Pula je jedno od najljepsih mjesta u Hrvatskoj. Obiluje preljepim plažama i znamenitostima. Najpoznatija znamenitost je Pulska arena.</p>
        <div class="gray-text">
          <a href="#" class="mb-social-icon"><i class="fa fa-twitter"></i></a>
          <a href="#" class="mb-social-icon"><i class="fa fa-facebook"></i></a>
          <a href="#" class="mb-social-icon"><i class="fa fa-pinterest"></i></a>
          <a href="#" class="mb-social-icon"><i class="fa fa-google-plus"></i></a>
        </div>
      </div>
    </div>
  </div>  
</div>
</section>
    @endsection

</body>
</html>