@extends('layouts.app')
@section('content')
<div class="container">
<br>
<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1>{{$apartment->property_title}}</h1>
		<h4>{{$apartment->apartment_city}}, Oglas objavljen: {{$apartment->created_at}}</h4>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="image-display">
		@foreach($apartment->photos as $photo)
			<a href="/{{$photo->photo_path}}" data-lightbox="mojagalerija">
			<img src="/{{$photo->thumbnail_path}}">
			</a>
		@endforeach
		</div>
	</div>
</div>
<br>
<br>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h2>Osnovni detalji oglasa</h2>
</div>
</div>
<hr>
<div class="row">
		<section class="icons-property-description">
			<ul class="ul-icons-property-description-section">
				<li class="li-icons-property-description-section">
					<i class="fa fa-clock-o" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Check-in, od: {{$apartment->check_in}}:00</strong></p>
				</li>
				<li class="li-icons-property-description-section">
					<i class="fa fa-clock-o" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Check-out, do: {{$apartment->check_out}}:00</strong></p>
				</li>
				<li class="li-icons-property-description-section">
					<i class="fa fa-key" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Broj soba: {{$apartment->number_of_bedrooms}}</strong></p>
				</li>	
				<li class="li-icons-property-description-section">
					<i class="fa fa-home" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Površina apartmana: {{$apartment->house_size}} m/2</strong></p>
				</li>	
				<li class="li-icons-property-description-section">
					<i class="fa fa-bath" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Broj wc-a: {{$apartment->number_of_bathrooms}}</strong></p>
				</li>	
				<li class="li-icons-property-description-section">
					<i class="fa fa-user" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Maksimalan broj osoba: {{$apartment->number_of_people}}</strong></p>
				</li>
				<li class="li-icons-property-description-section">
					<i class="fa fa-bed" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Kreveta za jednu osobu: {{$apartment->bed_for_one_number}}</strong></p>
				</li>

				<li class="li-icons-property-description-section">
					<i class="fa fa-bed" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Kreveta za dvije osobe: {{$apartment->bed_for_two_number}}</strong></p>
				</li>

				<li class="li-icons-property-description-section">
					<i class="fa fa-bed" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Dječijih kreveta: {{$apartment->children_bed_number}}</strong></p>
				</li>
				<li class="li-icons-property-description-section">
					<i class="fa fa-lock" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Sigurnosni depozit: {{$apartment->deposit}} €</strong></p>
				</li>
			</ul>
		</section>


</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2>Informacije o lokaciji apartmana:</h2>
	</div>
</div>
	<hr>
<div class="property-panel-color">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<section class="icons-property-description">
			<ul class="ul-icons-property-description-section">
				<li class="li-icons-property-description-section">
					<i class="fa fa-building" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Grad: {{$apartment->apartment_city}}</strong></p>
				</li>
				<li class="li-icons-property-description-section">
					<i class="fa fa-envelope" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Poštanski broj: {{$apartment->apartment_zip}}</strong></p>
				</li>
				<li class="li-icons-property-description-section">
					<i class="fa fa-road" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Ulica i kućni broj: {{$apartment->apartment_address}}</strong></p>
				</li>	
				<li class="li-icons-property-description-section">
					<i class="fa fa-picture-o" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Županija: {{$apartment->apartment_province}}</strong></p>
				</li>
			</ul>
		</section>

	</div>
</div>
</div>
<br>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2>Sadržaj i dodatci:</h2>
	</div>
</div>
	<hr>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<section class="icons-property-description">
			<ul class="ul-icons-property-description-section">
			@if($apartment->internet != null)
			<li class="li-icons-property-description-section">
					<i class="fa fa-globe" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Internet</strong></p>
			</li>
			@endif	
			@if($apartment->wireless != null)
			<li class="li-icons-property-description-section">
					<i class="fa fa-wifi" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Wireless</strong></p>
			</li>
			@endif	
			@if($apartment->cable_tv != null)
			<li class="li-icons-property-description-section">
					<i class="fa fa-television" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Tv</strong></p>
			</li>
			@endif	
			@if($apartment->kitchen != null)
			<li class="li-icons-property-description-section">
					<i><img src="/../img/kitchen.png"></i>
					<p><strong>Kuhinja</strong></p>
			</li>
			@endif
			
			@if($apartment->elevator != null)
			<li class="li-icons-property-description-section">
					<i><img src="/../img/elevator.png"></i>
					<p><strong>Dizalo</strong></p>
			</li>
			@endif
			@if($apartment->balcony != null)
			<li class="li-icons-property-description-section">
					<i><img src="/../img/balcony.png"></i>
					<p><strong>Balkon</strong></p>
			</li>
			@endif
			@if($apartment->smoking != null)
			<li class="li-icons-property-description-section">
					<i><img src="/../img/no-smoking.png"></i>
					<p><strong>Pušenje:zabranjeno</strong></p>
			</li>
			@endif
			@if($apartment->smoking == null)
			<li class="li-icons-property-description-section">
					<i><img src="/../img/yes-smoking.png"></i>
					<p><strong>Pušenje: dozvoljeno</strong></p>
			</li>
			@endif
			@if($apartment->gym != null)
			<li class="li-icons-property-description-section">
					<i><img src="/../img/gym.png"></i>
					<p><strong>Teretana</strong></p>
			</li>
			@endif
			@if($apartment->bed_linen != null)
			<li class="li-icons-property-description-section">
					<i class="fa fa-bed" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Namještanje kreveta</strong></p>
			</li>
			@endif	
			@if($apartment->pets != null)
			<li class="li-icons-property-description-section">
					<i><img src="/../img/pets_no_allowed.png"></i>
					<p><strong>Ljubimci:zabranjeni</strong></p>
			</li>
			@endif
			@if($apartment->pets == null)
			<li class="li-icons-property-description-section">
					<i><img src="/../img/pets_allowed.png"></i>
					<p><strong>Ljubimci:dozvoljeni</strong></p>
			</li>
			@endif
			@if($apartment->towels != null)
			<li class="li-icons-property-description-section">
					<i><img src="/../img/towels.png"></i>
					<p><strong>Mijenjanje ručnika</strong></p>
			</li>
			@endif	
			@if($apartment->parking != null)
			<li class="li-icons-property-description-section">
					<i><img src="/../img/parking.png"></i>
					<p><strong>Uključen parking</strong></p>
			</li>
			@endif	
			@if($apartment->air_conditioning != null)
			<li class="li-icons-property-description-section">
					<i><img src="/../img/air.png"></i>
					<p><strong>Klima uređaj</strong></p>
			</li>
			@endif	
			@if($apartment->washing_machine != null)
			<li class="li-icons-property-description-section">
					<i><img src="/../img/washing_machine.png"></i>
					<p><strong>Perilica za rublje</strong></p>
			</li>
			@endif	
			@if($apartment->wheel_chair != null)
			<li class="li-icons-property-description-section">
					<i><img src="/../img/wheel_chair.png"></i>
					<p><strong>Pristup za osobe u kolicima</strong></p>
			</li>
			@endif	
			@if($apartment->pool != null)
			<li class="li-icons-property-description-section">
					<i><img src="/../img/pool.png"></i>
					<p><strong>Bazen</strong></p>
			</li>
			@endif	
			</ul>
		</section>

	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2>Cijenik:</h2>
	</div>
</div>
	<hr>
	<div class="property-panel-color">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<section class="icons-property-description">
			<ul class="ul-icons-property-description-section">
			<li class="li-icons-property-description-section">
					<i class="fa fa-eur" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Cijena za jednu noć: {{$apartment->price_per_night}} €</strong></p>
			</li>
			@if($apartment->weekly_price != null)
			<li class="li-icons-property-description-section">
					<i class="fa fa-eur" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Cijena za tjedan dana: {{$apartment->weekly_price}} €</strong></p>
			</li>
			@endif	
			@if($apartment->monthly_price != null)
			<li class="li-icons-property-description-section">
					<i class="fa fa-eur" aria-hidden="true" style="font-size:24px"></i>
					<p><strong>Cijena za mjesec dana: {{$apartment->monthly_price}} €</strong></p>
			</li>
			@endif	
			</ul>
		</section>

	</div>
</div>
</div>
<br>
@if($apartment->property_description != "")
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2>Opis oglasa:</h2>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="description-text">
			{{$apartment->property_description}} 		
		</div>
	</div>
</div>
@endif	
<hr>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2>Komentari:</h2>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	@if(Auth::check()) {{-- ako je korisnik logiran moze komentirati --}}
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<i class="fa fa-user" aria-hidden="true" style="font-size:64px; margin-left:10px;"></i>
			
			<div class="user_property_text">
				<h4>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
				<strong>Registriran:</strong> {{Auth::user()->created_at}}<br>
			</div>	

		</div>
		<form role="form "method="POST" action="/property/addComment/{{$apartment->id}}">
		{{csrf_field()}}	
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
				<textarea type="text" name="comment" id="comment" class="form-control" rows="5" placeholder="Ostavi komentar"required></textarea>

				@if($errors->has('comment'))
				<span class="help-block">
					<strong>{{$errors->first('comment')}}</strong>
				</span>
				@endif
			</div>	
			<button type="submit" class="btn btn-primary btn pull-right"> Objavi</button>
		</div>
		</form>
		@else {{-- ako nije logiran nemoze okomentirati --}}
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<i class="fa fa-user" aria-hidden="true" style="font-size:64px; margin-left:10px;"></i>	
		<div class="user_property_text">
				Za komentiranje trebate se logirati ili registrirati
			</div>
		</div>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
				<textarea type="text" name="comment" id="comment" class="form-control" rows="5" placeholder="Ostavi komentar"></textarea>
				@if($errors->has('comment'))
				<span class="help-block">
					<strong>{{$errors->first('comment')}}</strong>
				</span>
				@endif
			</div>	
			<button type="#" class="btn btn-primary btn pull-right"> Objavi</button>
		</div>
		@endif
	</div>	
</div>
<hr>
@foreach($apartment->comments as $comment)
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<i class="fa fa-user" aria-hidden="true" style="font-size:64px; margin-left:10px;"></i>
			<div class="user_property_text">
			@foreach($allusers as $user_commented)
			@if($user_commented->id == $comment->user_id)
				<h4>{{$user_commented->first_name}} {{$user_commented->last_name}}</h4>
				<strong>Registriran:</strong> {{$user_commented->created_at}}<br>
				<strong>Komentar objavljen:</strong> {{$comment->created_at}}<br>
			@endif
			@endforeach
			</div>
		</div>

		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			{{$comment->comment}}
	</div>	
</div>
</div>
<hr>
@endforeach
</div>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
<div class="row">
<i class="fa fa-user" aria-hidden="true" style="font-size:100px; margin-left:100px;"></i>
<div class="user_property_text">
	<h4>{{$user->first_name}} {{$user->last_name}}</h4>
	<strong>Registriran:</strong> {{$user->created_at}}<br>
	<strong>Email:</strong> {{$user->email}}<br>
	<strong>Grad:</strong> {{$user->birth_city}}<br>
	<strong>Adresa:</strong> {{$user->user_address}}<br>
	</div>
	</div>
</div>

</div>
<hr>
@stop
