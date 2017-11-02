@extends('layouts.app')
@section('content')
<div class="new_property-panel">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="new_property-panel-heading-add-title"><div class="new_property-heading-title">Ovdje kreirate vaš oglas</div></div>
			</div>
		</div>
	</div>
</div>
<form role="form" method="POST" action="/property">
     {{csrf_field()}}
<div class="property-content">
	<div class="container">
		<div class="row">
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<h3>O vašem apartmanu</h3>
				<hr>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<label for="property_title">Naslov oglasa: *</label>
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="form-group {{$errors->has('property_title') ? 'has-error' : ''}}">
							<input type="text" name="property_title" id="property_title" class="form-control-large" placeholder="Max:30 slova" value="{{ old('property_title') }}">	
							@if($errors->has('property_title'))
							<span class="help-block">
								<strong>{{$errors->first('property_title')}}</strong>
							</span>
							@endif
						</div>	
					</div>

				</div>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<label for="check_in">Check in-od/out-do: *</label>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="form-group-space {{$errors->has('check_in') ? 'has-error' : ''}}">
							<select class="form-control-large" name="check_in" id="check_in">
							<option value="">Check in</option>								
							@for($i=0;$i <=24;$i++)				
							<option value="{{$i}}">{{$i}}</option>
							@endfor
							</select>
							@if($errors->has('check_in'))
							<span class="help-block">
								<strong>{{$errors->first('check_in')}}</strong>
							</span>
							@endif
						</div>	
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<div class="form-group-space {{$errors->has('check_out') ? 'has-error' : ''}}">
							<select class="form-control-large" name="check_out" id="check_out">
							<option value="">Check out</option>								
							@for($i=0;$i <=24;$i++)				
							<option value="{{$i}}">{{$i}}</option>
							@endfor
							</select>
							@if($errors->has('check_out'))
							<span class="help-block">
								<strong>{{$errors->first('check_out')}}</strong>
							</span>
							@endif
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<label for="number_of_bedrooms">Broj soba: *</label>
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="form-group-space {{$errors->has('number_of_bedrooms') ? 'has-error' : ''}}">
							<select class="form-control-small" name="number_of_bedrooms" id="number_of_bedrooms">
							<option value="">Odaberi</option>								
							@for($i=0;$i <=10;$i++)				
							<option value="{{$i}}">{{$i}}</option>
							@endfor
							</select>
							@if($errors->has('number_of_bedrooms'))
							<span class="help-block">
								<strong>{{$errors->first('number_of_bedrooms')}}</strong>
							</span>
							@endif
						</div>	
					</div>

				</div>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<label for="house_size">Kvadratura m/2: *</label>
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="form-group-space {{$errors->has('house_size') ? 'has-error' : ''}}">
							<input type="text" name="house_size" id="house_size" class="form-control-small" placeholder="npr:100" value="{{ old('house_size') }}">	
							@if($errors->has('house_size'))
							<span class="help-block">
								<strong>{{$errors->first('house_size')}}</strong>
							</span>
							@endif
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<label for="number_of_bathrooms">Broj wc-a: *</label>
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="form-group-space {{$errors->has('number_of_bathrooms') ? 'has-error' : ''}}">
							<select class="form-control-small" name="number_of_bathrooms" id="number_of_bathrooms">
							<option value="">Odaberi</option>
							@for($i=0;$i <=10;$i++)				
							<option value="{{$i}}">{{$i}}</option>
							@endfor
								
							</select>
							@if($errors->has('number_of_bathrooms'))
							<span class="help-block">
								<strong>{{$errors->first('number_of_bathrooms')}}</strong>
							</span>
							@endif
						</div>	
					</div>

				</div>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<label for="number_of_people">Maksimalan broj osoba: *</label>
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="form-group-space {{$errors->has('number_of_people') ? 'has-error' : ''}}">
							<select class="form-control-small" name="number_of_people" id="number_of_people">
								<option value="">Odaberi</option>
								@for($i=0;$i <=20;$i++)				
								<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select>
							@if($errors->has('number_of_people'))
							<span class="help-block">
								<strong>{{$errors->first('number_of_people')}}</strong>
							</span>
							@endif
						</div>	
					</div>

				</div>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<label for="beds">Broj i vrsta kreveta: *</label>
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<div class="form-group-space {{$errors->has('bed_for_one_number') ? 'has-error' : ''}}">
							<select class="form-control-large" name="bed_for_one_number" id="bed_for_one_number">
								<option value="">Za jednu osobu </option>
								@for($i=0;$i <=20;$i++)				
								<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select>
							@if($errors->has('bed_for_one_number'))
							<span class="help-block">
								<strong>{{$errors->first('bed_for_one_number')}}</strong>
							</span>
							@endif
						</div>	
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<div class="form-group-space {{$errors->has('bed_for_two_number') ? 'has-error' : ''}}">
							<select class="form-control-large" name="bed_for_two_number" id="bed_for_two_number">
								<option value="">Za dvije osobe</option>
								@for($i=0;$i <=20;$i++)				
								<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select>
							@if($errors->has('bed_for_two_number'))
							<span class="help-block">
								<strong>{{$errors->first('bed_for_two_number')}}</strong>
							</span>
							@endif
						</div>	
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<div class="form-group-space {{$errors->has('children_bed_number') ? 'has-error' : ''}}">
							<select class="form-control-large" name="children_bed_number" id="children_bed_number">
								<option value="">Dječiji</option>
								@for($i=0;$i <=20;$i++)				
								<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select>
							@if($errors->has('children_bed_number'))
							<span class="help-block">
								<strong>{{$errors->first('children_bed_number')}}</strong>
							</span>
							@endif
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<label for="deposit">Sigurnosni depozit (€):</label>
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="form-group-space {{$errors->has('deposit') ? 'has-error' : ''}}">
	 					<input type="text" name="deposit" id="deposit" class="form-control-small" placeholder="€">
							@if($errors->has('deposit'))
							<span class="help-block">
								<strong>{{$errors->first('deposit')}}</strong>
							</span>
							@endif
						</div>	
					</div>

				</div>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<label for="property_description">Opis:</label>
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="form-group-space {{$errors->has('property_description') ? 'has-error' : ''}}">
							<textarea type="text" name="property_description" id="property_description" class="form-control" rows="10"></textarea>
							@if($errors->has('property_description'))
							<span class="help-block">
								<strong>{{$errors->first('property_description')}}</strong>
							</span>
							@endif
						</div>	
					</div>

				</div>
			</div>

			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<h4>Preporuka opisa</h4>
				<p>
				Naslovite vaš oglas, te selektirajte ponuđene mogućnosti s padajućih lista. Opišite vaš oglas
				na način da opišete, djelove vašeg apartmana. Napišite što vaš apartman čini posebni.
				Napišite zašto bi gosti trebali izabrati baš vaš apartmana.Možete i ukratko opisati postupak dolaska do vašeg apartmana prilikom gostovog dolaska u mjesto.Sva polja izuzev sigurnosnog depozita i opisa ste dužni ispunit.
				</p>
			</div>
		</div>
<br><br>
		{{-- KRAJ OPISA "O VAŠEM APARTMANU" --}}

		<div class="row">
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<h3>Lokacija apartmana</h3>
				<hr>
				<div class="row">
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<label for="adress">Adresa:</label>
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<div class="form-group-space {{$errors->has('apartment_city') ? 'has-error' : ''}}">
							 <input id="city" name="apartment_city" class="form-control-medium form-control-search" autocomplete="off" data-country="hr" placeholder="Grad/Mjesto" type="search" value="{{ old('apartment_city') }}">
							@if($errors->has('apartment_city'))
							<span class="help-block">
								<strong>{{$errors->first('apartment_city')}}</strong>
							</span>
							@endif
						</div>	
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<div class="form-group-space{{$errors->has('apartment_zip') ? 'has-error' : ''}}">
							<input type="text" name="apartment_zip" id="apartment_zip" class="form-control-medium" placeholder="Postanski broj/zip" value="{{ old('apartment_zip') }}">	
							@if($errors->has('apartment_zip'))
							<span class="help-block">
								<strong>{{$errors->first('apartment_zip')}}</strong>
							</span>
							@endif
						</div>	
					</div>

				</div>
				<div class="row">
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">					
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<div class="form-group-space {{$errors->has('apartment_address') ? 'has-error' : ''}}">
							<input type="text" name="apartment_address" id="apartment_address" class="form-control-large" placeholder="Ulica i kućni broj" value="{{ old('apartment_address') }}">	
							@if($errors->has('apartment_address'))
							<span class="help-block">
								<strong>{{$errors->first('apartment_address')}}</strong>
							</span>
							@endif
						</div>	
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<div class="form-group-space{{$errors->has('apartment_province') ? 'has-error' : ''}}">
							<input type="text" name="apartment_province" id="apartment_province" class="form-control-large" placeholder="Županija" value="{{ old('apartment_province') }}">	
							@if($errors->has('apartment_province'))
							<span class="help-block">
								<strong>{{$errors->first('apartment_province')}}</strong>
							</span>
							@endif
						</div>	
					</div>

				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<h4>Preporuka ispunjavanja</h4>
				<p>
				Ovdje ce te reći nekoliko informacija o lokaciji vašeg apartmana. Za odabir grada pojavit
				ce vam se padajuca lista prilikom upisa prvih nekoliko slova. Pazite da su vam podatci točni,
				jer samo ce vas tako potencijalni pretraživači uspješno pronaći
				</p>
			</div>
		</div>

				{{-- KRAJ OPISA "LOKACIJA APARTMANA" --}}
<br>
<br>
				{{-- POČETAK OPISA SADRŽAJA --}}
		<div class="row">
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<h3>Sadržaj ili dodatci</h3>
				<hr>
				<div class="row">
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<div class="form-group-space {{$errors->has('internet') ? 'has-error' : ''}}">
							<div class="checkbox checkbox-success">
								<input id="internet" class="styled" type="checkbox" name="internet" value="1">
								<label for="internet">
									Internet
								</label>
							</div>
							@if($errors->has('internet'))
							<span class="help-block">
								<strong>{{$errors->first('internet')}}</strong>
							</span>
							@endif
						</div>	
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<div class="form-group-space {{$errors->has('wireless') ? 'has-error' : ''}}">
							<div class="checkbox checkbox-success">
								<input id="wireless" class="styled" type="checkbox" name="wireless" value="1">
								<label for="wireless">
									Wireless
								</label>
							</div>
							@if($errors->has('wireless'))
							<span class="help-block">
								<strong>{{$errors->first('wireless')}}</strong>
							</span>
							@endif
						</div>	
					</div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<div class="form-group-space {{$errors->has('pool') ? 'has-error' : ''}}">
								<div class="checkbox checkbox-success">
									<input id="pool" class="styled" type="checkbox" name="pool" value="1">
									<label for="pool">
										Bazen
									</label>
								</div>
								@if($errors->has('pool'))
								<span class="help-block">
									<strong>{{$errors->first('pool')}}</strong>
								</span>
								@endif
							</div>	
						</div>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<div class="form-group-space {{$errors->has('cable_tv') ? 'has-error' : ''}}">
							<div class="checkbox checkbox-success">
								<input id="cable_tv" class="styled" type="checkbox" name="cable_tv" value="1">
								<label for="cable_tv">
									Televizor
								</label>
							</div>
							@if($errors->has('cable_tv'))
							<span class="help-block">
								<strong>{{$errors->first('cable_tv')}}</strong>
							</span>
							@endif
						</div>	
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<div class="form-group-space {{$errors->has('kitchen') ? 'has-error' : ''}}">
							<div class="checkbox checkbox-success">
								<input id="kitchen" class="styled" type="checkbox" name="kitchen" value="1">
								<label for="kitchen">
									Kuhinja
								</label>
							</div>
							@if($errors->has('kitchen'))
							<span class="help-block">
								<strong>{{$errors->first('kitchen')}}</strong>
							</span>
							@endif
						</div>	
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<div class="form-group-space {{$errors->has('bed_linen') ? 'has-error' : ''}}">
								<div class="checkbox checkbox-success">
									<input id="bed_linen" class="styled" type="checkbox" name="bed_linen" value="1">
									<label for="bed_linen">
									Namještanje kreveta
									</label>
								</div>
								@if($errors->has('bed_linen'))
								<span class="help-block">
									<strong>{{$errors->first('bed_linen')}}</strong>
								</span>
								@endif
							</div>	
					</div>

				</div>
				<div class="row">
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<div class="form-group-space {{$errors->has('gym') ? 'has-error' : ''}}">
								<div class="checkbox checkbox-success">
									<input id="gym" class="styled" type="checkbox" name="gym" value="1">
									<label for="gym">
										Teretana
									</label>
								</div>
								@if($errors->has('gym'))
								<span class="help-block">
									<strong>{{$errors->first('gym')}}</strong>
								</span>
								@endif
							</div>	
					</div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<div class="form-group-space {{$errors->has('elevator') ? 'has-error' : ''}}">
								<div class="checkbox checkbox-success">
									<input id="elevator" class="styled" type="checkbox" name="elevator" value="1">
									<label for="elevator">
										Lift
									</label>
								</div>
								@if($errors->has('elevator'))
								<span class="help-block">
									<strong>{{$errors->first('elevator')}}</strong>
								</span>
								@endif
							</div>	
						</div>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<div class="form-group-space {{$errors->has('balcony') ? 'has-error' : ''}}" >
								<div class="checkbox checkbox-success">
									<input id="balcony" class="styled" type="checkbox" name="balcony" value="1">
									<label for="balcony">
										Balkon
									</label>
								</div>
								@if($errors->has('balcony'))
								<span class="help-block">
									<strong>{{$errors->first('balcony')}}</strong>
								</span>
								@endif
							</div>	
						</div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<div class="form-group-space {{$errors->has('smoking') ? 'has-error' : ''}}">
								<div class="checkbox checkbox-success">
									<input id="smoking" class="styled" type="checkbox" name="smoking" value="1">
									<label for="smoking">
										Pušenje dozvoljeno?
									</label>
								</div>
								@if($errors->has('smoking'))
								<span class="help-block">
									<strong>{{$errors->first('smoking')}}</strong>
								</span>
								@endif
							</div>	
						</div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<div class="form-group-space {{$errors->has('pets') ? 'has-error' : ''}}">
								<div class="checkbox checkbox-success">
									<input id="pets" class="styled" type="checkbox" name="pets" value="1">
									<label for="pets">
										Kućni ljubimci dozvoljeni?
									</label>
								</div>
								@if($errors->has('pets'))
								<span class="help-block">
									<strong>{{$errors->first('pets')}}</strong>
								</span>
								@endif
							</div>	
						</div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<div class="form-group-space {{$errors->has('towels') ? 'has-error' : ''}}">
								<div class="checkbox checkbox-success">
									<input id="towels" class="styled" type="checkbox" name="towels" value="1">
									<label for="towels">
										Mijenjanje ručnika
									</label>
								</div>
								@if($errors->has('towels'))
								<span class="help-block">
									<strong>{{$errors->first('towels')}}</strong>
								</span>
								@endif
							</div>	
				</div>
					<div class="row">			
					</div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<div class="form-group-space {{$errors->has('parking') ? 'has-error' : ''}}">
								<div class="checkbox checkbox-success">
									<input id="parking" class="styled" type="checkbox" name="parking" value="1">
									<label for="parking">
										Uključen parking
									</label>
								</div>
								@if($errors->has('parking'))
								<span class="help-block">
									<strong>{{$errors->first('parking')}}</strong>
								</span>
								@endif
							</div>	
						</div>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<div class="form-group-space {{$errors->has('air_conditioning') ? 'has-error' : ''}}">
								<div class="checkbox checkbox-success">
									<input id="air_conditioning" class="styled" type="checkbox" name="air_conditioning" value="1">
									<label for="air_conditioning">
										Klima
									</label>
								</div>
								@if($errors->has('air_conditioning'))
								<span class="help-block">
									<strong>{{$errors->first('air_conditioning')}}</strong>
								</span>
								@endif
							</div>	
						</div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<div class="form-group-space {{$errors->has('washing_machine') ? 'has-error' : ''}}">
								<div class="checkbox checkbox-success">
									<input id="washing_machine" class="styled" type="checkbox" name="washing_machine" value="1">
									<label for="washing_machine">
										Perilica
									</label>
								</div>
								@if($errors->has('washing_machine'))
								<span class="help-block">
									<strong>{{$errors->first('washing_machine')}}</strong>
								</span>
								@endif
							</div>	
						</div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<div class="form-group-space {{$errors->has('wheel_chair') ? 'has-error' : ''}}">
								<div class="checkbox checkbox-success">
									<input id="wheel_chair" class="styled" type="checkbox" name="wheel_chair"  value="1">
									<label for="wheel_chair">
										Pristup za osobe u kolicima
									</label>
								</div>
								@if($errors->has('wheel_chair'))
								<span class="help-block">
									<strong>{{$errors->first('wheel_chair')}}</strong>
								</span>
								@endif
							</div>	
						</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<h4>Preporuka ispunjavanja</h4>
				<p>
					Ovdje će te reći pretraživačima nešto o sadržajima i dodatcima koje vaš aprtman sadrži.
					To činite vrlo lagano klikom na naziv ili prozorčić pojedinog sadržaja ili dodatka.
					Nijedno polje niste obvezni ispuniti, no ako ne označite da su pušenje ili ljubimci dozvoljeni, podrazumijevat će se da nisu.
				</p>
			</div>
			<br><br>
			</div>
{{-- KRAJ OPISA SADRŽAJA --}}
{{-- CIJENIK --}}
			<div class="row">
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<h3>Cijenik:</h3>
				<hr>
				<div class="row">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<label for="price_per_night">Cijena za jednu noć (€): *</label>
					</div>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<div class="form-group-space {{$errors->has('price_per_night') ? 'has-error' : ''}}">
							 <input type="text" name="price_per_night" id="price_per_night" class="form-control-medium" placeholder="€">	
							@if($errors->has('price_per_night'))
							<span class="help-block">
								<strong>{{$errors->first('price_per_night')}}</strong>
							</span>
							@endif
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<label for="weekly_price">Cijena za tjedan dana(€):</label>
					</div>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<div class="form-group-space {{$errors->has('weekly_price') ? 'has-error' : ''}}">
							  <input type="text" name="weekly_price" id="weekly_price" class="form-control-medium" placeholder="€">
							@if($errors->has('weekly_price'))
							<span class="help-block">
								<strong>{{$errors->first('weekly_price')}}</strong>
							</span>
							@endif
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<label for="monthly_price">Cijena za mjesec dana(€):</label>
					</div>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<div class="form-group-space {{$errors->has('monthly_price') ? 'has-error' : ''}}">
							 <input type="text" name="monthly_price" id="monthly_price" class="form-control-medium" placeholder="€" value="{{ old('monthly_price') }}">
							@if($errors->has('monthly_price'))
							<span class="help-block">
								<strong>{{$errors->first('monthly_price')}}</strong>
							</span>
							@endif
						</div>	
					</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<h4>Preporuka ispunjavanja</h4>
				<p>
				Ovdje upisujete cijene vašeg apartmana.Unosite ukupnu cijenu ( ne po osobi).
				Obavezni ste unjeti cijenu po danu, a za tjedan i mjesec unosite ako želite.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<hr>
				<button type="submit" class="btn btn-warning">Nastavak: dodavanje slika</button>
				<hr>
			</div>
		</div>
	</div>
</div>
</form>
@endsection
