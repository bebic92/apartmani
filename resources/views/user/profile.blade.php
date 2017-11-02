
@inject('countries','App\Http\Utilities\Country')
@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel-heading"><i class="fa fa-user" aria-hidden="true" style="font-size:48px">  {{ $user->first_name }} {{ $user->last_name }}</i></div>
		</div>
	</div>
	<hr>
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
		<form role="form" method="POST" action="/user">
			{{csrf_field()}}
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">	
					<div class="form-group {{$errors->has('first_name') ? 'has-error' : ''}}">
						<label for="first_name">Ime:</label>
						<input type="text" name="first_name" id="first_name" class="form-control-large" value="{{ $user->first_name }}" >	
						@if($errors->has('first_name'))
						<span class="help-block">
							<strong>{{$errors->first('first_name')}}</strong>
						</span>
						@endif
					</div>					
					<div class="form-group {{$errors->has('last_name') ? 'has-error' : ''}}">
						<label for="last_name">Prezime:</label>
						<input type="text" name="last_name" id="last_name" class="form-control-large" value="{{$user->last_name}}">
						@if($errors->has('last_name'))
						<span class="help-block">
							<strong>{{$errors->first('last_name')}}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">	
					<div class="form-group {{$errors->has('date_of_birth') ? 'has-error' : ''}}">
						<label for="date_of_birth">Datum rođenja</label>
						@if($user->date_of_birth =='0000-00-00')
						<input type="text" name="date_of_birth" id="date_of_birth" class="form-control-large" value="" placeholder="g-m-d">
						@else
						<input type="text" name="date_of_birth" id="date_of_birth" class="form-control-large" value="{{$user->date_of_birth}}" placeholder="g-m-d">
						@endif
						@if($errors->has('date_of_birth'))
						<span class="help-block">
							<strong>{{$errors->first('date_of_birth')}}</strong>
						</span>
						@endif
					</div>
					<div class="form-group {{$errors->has('gender') ? 'has-error' : ''}}">
						<label for="gender">Spol</label>
						<select class="form-control-large" name="gender" id="gender">
						 @if($user->gender=='male')					
							<option value="male">Muško</option>
							<option value="female">Žensko</option>
							<option value="">Ne želim otkriti spol</option>
						 @elseif($user->gender=='female')
							<option value="female">Žensko</option>
							<option value="male">Muško</option>					
							<option value="">Ne želim otkriti spol</option>	
						 @else
							<option value="">Ne želim otkriti spol</option>					
							<option value="female">Žensko</option>
							<option value="male">Muško</option>
						 @endif
						</select>
						@if($errors->has('gender'))
						<span class="help-block">
							<strong>{{$errors->first('gender')}}</strong>
						</span>
						@endif
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
						<label for="email">Email:</label>
						<input type="text" name="email" id="email" class="form-control-large" value="{{$user->email}}">
						@if($errors->has('email'))
						<span class="help-block">
							<strong>{{$errors->first('email')}}</strong>
						</span>
						@endif
					</div>	
					<div class="form-group {{ $errors->has('user_phone') ? 'has-error' : ''}}">
						<label for="user_phone">Broj telefona:</label>
						<input type="text" name="user_phone" id="user_phone" class="form-control-large" value="{{$user->user_phone}}">
						@if($errors->has('user_phone'))
						<span class="help-block">
							<strong>{{$errors->first('user_phone')}}</strong>
						</span>
						@endif
					</div>	
					<div class="form-group {{$errors->has('birth_country') ? 'has-error' : ''}}">
						<div class="form-group">
							<label for="birth_country">Država rođenja</label>
							<select id="birth_country" name="birth_country" class="form-control-large">
								@foreach($countries::all() as $country)
								@if($country == $user->birth_country)
								<option value="{{$country}}" selected>{{$country}}</option>
								@else
								<option value="{{$country}}">{{$country}}</option>
								@endif
								@endforeach
							</select>
						</div>
						@if($errors->has('birth_country'))
						<span class="help-block">
							<strong>{{$errors->first('birth_country')}}</strong>
						</span>
						@endif
					</div>
					<div class="form-group {{$errors->has('birth_city') ? 'has-error' : ''}}">
						<div class="form-group">
							<label for="birth_city">Grad rođenja</label>
							<input id="city" name="birth_city" class="form-control-large" autocomplete="off" data-country="hr" value="{{$user->birth_city}}">
						</div>
						@if($errors->has('birth_city'))
						<span class="help-block">
							<strong>{{$errors->first('birth_city')}}</strong>
						</span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('user_address') ? 'has-error' : ''}}">
						<label for="user_address">Adresa stanovanja:</label>
						<input type="text" name="user_address" id="user_address" class="form-control-large" value="{{$user->user_address}}">
						@if($errors->has('user_address'))
						<span class="help-block">
							<strong>{{$errors->first('user_address')}}</strong>
						</span>
						@endif
					</div>	
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="password">Nova lozinka</label>
						<input id="password" type="password" class="form-control-large" name="password">
						@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
						<label for="password-confirm">Potvrdite lozinku</label>
						<input id="password-confirm" type="password" class="form-control-large" name="password_confirmation">
						@if ($errors->has('password_confirmation'))
						<span class="help-block">
							<strong>{{ $errors->first('password_confirmation') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
						<label for="description">O meni:</label>
						<textarea type="text" name="description" id="description" class="form-control" rows="10">{{$user->description}}</textarea>
						@if($errors->has('description'))
						<span class="help-block">
							<strong>{{$errors->first('description')}}</strong>
						</span>
						@endif
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<hr>
					<button type="submit" class="btn btn-warning">Spremi</button>
				</div>
			</div>
			<br>
		</form>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<h4>Opis</h4>
		<p>Ovo je vaš, profil. Ovdje možete mijenjati podatke o sebi, koje god želite.
			Isto tako možete promjeniti lozinku, te dodati podatke koje niste trebali prilikom registracije
		</p>
	</div>
</div>
@endsection