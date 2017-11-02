@extends('layouts.app')
@section('content')
<div class="all_user_propertys-panel">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="all_user_propertys-panel-heading-add-title"><div class="all_user_propertys-heading-title">Vaši oglasi</div></div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			@foreach($apartments as $apartment)
			<form role="form" method="POST" action="/property/{{$apartment->id}}" class="delete">
			<input type="hidden" name="_method" value="DELETE">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<div class="image-display">
						@if($apartment->photos != '[]')
							@foreach($apartment->photos as $photo)	
								<img src="/{{$photo->thumbnail_path}}">
							@break
							@endforeach
							@else
								<img src="http://www.thebakerymadewithlove.com/wp-content/uploads/2014/08/placeholder.png" style="width:250px;height:150px">
						@endif
					</div>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
				<div class="row">
					<h4><strong>{{$apartment->property_title}}</strong></h4>
					<strong>Grad ili mjesto:</strong> {{$apartment->apartment_city}}<br>
					<strong>Ulica:</strong> {{$apartment->apartment_address}}<br>
					<strong>Postanski broj:</strong> {{$apartment->apartment_zip}}<br>
					<strong>Županija:</strong> {{$apartment->apartment_province}}<br>
				</div>
				<br>
				<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<button type="submit" class="btn btn-danger btn pull-right">Brisi oglas</button>
				</div>	
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<a href="/property/{{$apartment->id}}/view" class="btn btn-primary btn pull-right">Pogledajte oglas</a>
				</div>			
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<a href="/property/{{$apartment->id}}/edit" class="btn btn-success btn pull-right">Uredi oglas</a>
					</div>
					</div>
				</div>		
				</div>
			</div>
			<hr>
			</form>
			@endforeach
		</div>	
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<h4>Opis</h4>
			<p>Ovdje se nalaze svi vaši oglasi, 
				klikom na željeni oglas možete ga brisati, mijenjati.
				Isto tako možete dodavati nove slike, i brisati postojeće.
			</p>	
		</div>
	</div>
</div>

@endsection