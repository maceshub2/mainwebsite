@extends('layouts.app')
@section('css')
<link rel="stylesheet"  href="{{ asset('assets/lightslider.css') }}"/>
<style>
	ul{
		list-style: none outside none;
		padding-left: 0;
		margin: 0;
	}
	.demo .item{
		margin-bottom: 60px;
	}
	.content-slider li{
		background-color: #ed3020;
		text-align: center;
		color: #FFF;
	}
	.content-slider h3 {
		margin: 0;
		padding: 70px 0;
	}
	.demo{
		width: 800px;
	}
</style>
@endsection

@section('content')
<main>
	<div class="detail__main clearfix">
		<section class="detail_slider-container">
			<div class="photo-slider">
				<div class="photo-slider_main">

					<ul id="image-gallery" class="gallery list-unstyled cS-hidden">

						@foreach($product->images as $item)
						<li data-thumb="{{ env('MAIN_APP_URL') }}{{ $item->path?$item->path:'assets/main/No_image.png' }}"> 
							<img src="{{ env('MAIN_APP_URL') }}{{ $item->path?$item->path:'assets/main/No_image.png' }}" />
						</li>
						@endforeach

					</ul>
				</div>
			</div>
		</section>

		<div class="detail_basics-container clearfix">
			<h1 class="detail__title">
				{{ $product->product_company?$product->product_company->name:'' }}
				{{ $product->product_model?$product->product_model->model:'' }}
			</h1>
			<div class="detail__price">Current Vehicle Price:
				@php
				if($item->options && $item->options->price_type!=0){
					$additional=$item->options->price_type==1?
					$item->options->price:
					(($item->options->price/100)*$item->total_price);
				}else{
					$additional=$setting->type==1?$setting->price:(($setting->price/100)*$item->total_price);
				}
				@endphp
				<strong class="detail__now-price">${{ $product->total_price }}</strong></div>


				<a href="#inquiry" class="bf-btn" style="padding-top: 20px">
					SEND INQUIRY
					{{-- <span>0 people are inquiring</span> --}}
				</a>


				<section class="detail__module">
					<h2 class="detail__subtitle">Standard Features</h2>

					<div class="detail__feature-container">
						@foreach(\App\Accessory::all() as $item)
						<div id="feature_{{ $item->id }}" class="detail__feature detail__feature--off">{{ $item->name }}</div>
						@endforeach
					</div>

				</section>

			</div>
		</div>

		<section class="detail__module">
			<h2 class="detail__subtitle">SPECS</h2>
			<div class="detail__spec-container clearfix">
				<ul class="detail__spec-list">
					<li>
						<div class="detail__spec-key">
							Vehicle No.
						</div>
						<div class="detail__spec-value">
							{{ $product->ref_no }}
						</div>
					</li>

					<li>
						<div class="detail__spec-key">

							Chassis #

						</div>


						<div class="detail__spec-value">

							{{ $product->chassis_no }}

						</div>
					</li>

					<li>
						<div class="detail__spec-key">
							Model Code
						</div>
						<div class="detail__spec-value">
							{{ $product->model_code?$product->model_code:'-' }}
						</div>
					</li>

					<li>
						<div class="detail__spec-key">
							Version / Class
						</div>
						<div class="detail__spec-value">
							{{ $product->grade?$product->grade:'-' }}
						</div>
					</li>
					<li>
						<div class="detail__spec-key">
							Engine Code
						</div>
						<div class="detail__spec-value">
							{{ $product->engine_code?$product->engine_code:'-' }}
						</div>
					</li>

					<li>
						<div class="detail__spec-key">

							Mileage

						</div>


						<div class="detail__spec-value">

							{{ $product->mileage?$product->mileage:'-' }}

						</div>
					</li>

					<li>
						<div class="detail__spec-key">

							Engine Size

						</div>


						<div class="detail__spec-value">

							{{ $product->engine_cc?$product->engine_cc:'-' }}

						</div>
					</li>

				</ul>


				<ul class="detail__spec-list">

					<li>
						<div class="detail__spec-key">
							Registration Month/Year
						</div>

						<sup>
							<a href="#footnote-1">1</a>
						</sup>


						<div class="detail__spec-value">

							{{ $product->registration_date?$product->registration_date:'-' }}

						</div>
					</li>

					<li>
						<div class="detail__spec-key">

							Manufacture Month/Year

						</div>

						<sup>
							<a href="#footnote-1">1</a>
						</sup>


						<div class="detail__spec-value">

							{{ $product->manufacture_date?$product->manufacture_date:'-' }}

						</div>
					</li>

					<li>
						<div class="detail__spec-key">

							Ext. Color

						</div>


						<div class="detail__spec-value">

							{{ $product->product_color?$product->product_color->name:'-' }}


						</div>
					</li>

					<li>
						<div class="detail__spec-key">

							Wheel Drive

						</div>


						<div class="detail__spec-value">

							{{ $product->drive_type?$product->drive_type:'-' }}

						</div>
					</li>

					<li>
						<div class="detail__spec-key">

							Location

						</div>


						<div class="detail__spec-value">

							{{ $product->country?$product->country->name:'-' }}

						</div>
					</li>

					<li>
						<div class="detail__spec-key">

							Transmission

						</div>


						<div class="detail__spec-value">

							{{ $product->transmission?$product->transmission:'-' }}


						</div>
					</li>

				</ul>


				<ul class="detail__spec-list">

					<li>
						<div class="detail__spec-key">

							Doors

						</div>


						<div class="detail__spec-value">
							{{ $product->no_of_doors?$product->no_of_doors:'-' }}
						</div>
					</li>

					<li>
						<div class="detail__spec-key">

							Steering

						</div>


						<div class="detail__spec-value">

							{{ $product->steering?$product->steering:'-' }}

						</div>
					</li>

					<li>
						<div class="detail__spec-key">

							Fuel

						</div>


						<div class="detail__spec-value">

							{{ $product->fuel_type?$product->fuel_type:'-'  }}

						</div>
					</li>

					<li>
						<div class="detail__spec-key">

							Seats

						</div>


						<div class="detail__spec-value">

							{{ $product->seats?$product->seats:'-'  }}

						</div>
					</li>

					<li>
						<div class="detail__spec-key">

							Weight

						</div>


						<div class="detail__spec-value">

							{{ $product->weight?$product->weight:'-'  }}

						</div>
					</li>

				</ul>

			</div>

			<ul class="detail__footnote">
				<li class="detail__footnote-item" id="footnote-1">
					<sup>1</sup>You need to look up the Import Regulation of your
					country for this vehicle.
				</li>
			</ul>
		</section>

	</main>

</div>


<div class="ext">
	<div class="ext-inner">
		<section id="inquiry" class="detail__module">
			@if(Session::has('result'))
			<div class="alert alert-success" style="text-align: center;">
				<strong>
					Thank you for your inquiry!<br>
					We'll contact with you via Email as soon as inquiry is confirmed
				</strong>  
			</div>
			@endif
			@if($errors->any())
			<div class="alert alert-danger">
				<strong>
					@foreach($errors->all() as $error)
					{{ $error }}<br>
					@endforeach
				</strong>  
			</div>
			@endif

			<div id="inquiry-top"></div>
			<h2 class="detail__subtitle">Send Us An Inquiry</h2> <!----> <!---->
			<form action="{{ route('product.quote',['ref_no'=> $product->ref_no]) }}" method="post">
				@csrf
				<div>

					<div class="inquiry-container">
						<div class="inquiry-item">
							<label for="username" class="inquiry-key inquiry-key--must">
								your name
							</label>
							<div class="inquiry-field">
								<input title="username" name="name" class="inquiry-input" required>
								<!---->
							</div>
						</div>
						<div class="inquiry-item">
							<label for="country"
							class="inquiry-key inquiry-key--must">
							country
						</label>
						<div class="inquiry-field">
							<div class="dropdown-select">
								<select id="country" name="country" class="dropdown-select_select" required>
									<option value="">Choose Country</option>

									@foreach(\App\Country::all() as $item)
									<option value="{{ $item->id }}">{{ $item->name }}</option>
									@endforeach
								</select>
								<i class="material-icons">arrow_drop_down</i>
							</div>
							<!---->
						</div>
					</div>
					<div class="inquiry-item">
						<label for="city" class="inquiry-key inquiry-key--must">city</label>
						<div class="inquiry-field">
							<input title="city" name="city" class="inquiry-input" required> <!---->
						</div>
					</div>
					<div class="inquiry-item">
						<label for="port" class="inquiry-key">dest. port</label>
						<div class="inquiry-field">
							<div class="dropdown-select">
								<select name="port" id="ports" class="dropdown-select_select Empty" >
									<option value="">Unknown</option>
								</select> 
								<i class="material-icons">arrow_drop_down</i>
							</div>
							<!---->
						</div>
					</div>
					<div class="inquiry-item">
						<label for="email" class="inquiry-key inquiry-key--must">email</label>
						<div class="inquiry-field">
							<input title="email" name="email" class="inquiry-input" required> <!---->
						</div>
					</div>
					<div class="inquiry-item">
						<label for="address"
						class="inquiry-key inquiry-key--must">address</label>
						<div class="inquiry-field">
							<input title="address" name="address" class="inquiry-input" required> <!---->
						</div>
					</div>
					<div class="inquiry-item">
						<label for="tel" class="inquiry-key inquiry-key--must">Phone</label>
						<div class="inquiry-field">
							<input title="tel" name="phone" class="inquiry-input" required> <!---->
						</div>
						<input type="hidden" name="product_id" value="{{ $product->id }}">
						<input type="hidden" name="price" value="{{ $product->total_price }}">

					</div>
				</div>
				<div class="inquiry-btn-container">
					<button class="inquiry-btn inquiry-btn--pre" type="submit">
						SEND INQUIRY
					</button>  
				</div>
			</form>

		</div> 
		<!---->
	</section>
</div>
</div>
</main>
@endsection

@section('js')
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
<script src="{{ asset('assets/js/lightslider.js') }}"></script> 
<script>
	$(document).ready(function() {
		$("#content-slider").lightSlider({
			loop:false,
			keyPress:true
		});
		$('#image-gallery').lightSlider({
			gallery:true,
			item:1,
			thumbItem:9,
			slideMargin: 0,
			speed:500,
			auto:false,
			loop:false,
			onSliderLoad: function() {
				$('#image-gallery').removeClass('cS-hidden');
			}  
		});
	});</script>
	<script type="text/javascript">
		$(document).ready(function(){
			var accessories = '{{$product->accessories}}';
			accessories = accessories.split(",");
			for (var i = 0; i < accessories.length; i++) {
				$("#feature_" + accessories[i]).removeClass('detail__feature--off');
			}
		});</script>
		<script src="{{ asset('assets/js/quote.js') }}"></script>

		@stop