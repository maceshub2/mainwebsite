@extends('layouts.app')

@section('banner')
@include('layouts.banner')
@stop

@section('pop-up')
@include('components.search-pop')
@stop

@section('sidebar')
@include('layouts.sidebar')
@stop

@section('content')
<main class="home__main" style="margin-top: 10px">
    <section class="module">
        <h2 class="module__title">New Arrivals</h2>
        <ul class="home-car__list">
            <?php 
                $url = "http://maceshub.com/api/product/new_arrivals";
                $checkpro = CH::callAPI($url);
               

            ?>
            @foreach($products as $item)

            <li class="home-car__item">
               <a href="{{ route('show.product',['ref_no' => $item->ref_no]) }}">
                <div class="home-car__img">
                   <img src="{{ env('MAIN_APP_URL') }}{{$item->photo?$item->photo->path:'assets/main/NO_image.png'}}" alt="{{ $item->product_company?$item->product_company->name:'' }}
                   {{ $item->product_model?$item->product_model->model:'' }}">
               </div>
               <div class="home-car__title">
                {{ $item->product_company?$item->product_company->name:'' }}
            </div>
            <div class="home-car__title">
                {{ $item->product_model?$item->product_model->model:'' }}
            </div>
            <div class="home-car__price">
                Vehicle Price:$
                @php
                if($item->options && $item->options->price_type!=0){
                    $additional=$item->options->price_type==1?
                    $item->options->price:
                    (($item->options->price/100)*$item->total_price);
                }else{
                    $additional=$setting->type==1?$setting->price:(($setting->price/100)*$item->total_price);
                }
                @endphp
                {{ $item->total_price+$additional }}
            </div>
        </a>
    </li>
    @endforeach
</ul>
</section>


{{-- Deal wise product display --}}
@foreach($deals as $deal)
<section class="module">
    <h2 class="module__title">{{ $deal->name }} : </h2>
    <ul class="home-car__list">
        @foreach(array_slice($deal->products, 0, 5, true) as $item)
        <li class="home-car__item">
           <a href="{{ route('show.product',['ref_no' => $item->ref_no]) }}">
            <div class="home-car__img">
               <img src="{{ env('MAIN_APP_URL') }}{{$item->photo?$item->photo->path:'assets/main/NO_image.png'}}" alt="{{ $item->product_company?$item->product_company->name:'' }}{{ $item->product_model?$item->product_model->model:'' }}">
           </div>
           <div class="home-car__title">
            {{ $item->product_company?$item->product_company->name:'' }}
        </div>
        <div class="home-car__title">
            {{ $item->product_model?$item->product_model->model:'' }}
        </div>
        <div class="home-car__price">
            Vehicle Price:$
            @php
            if($item->options && $item->options->price_type!=0){
                $additional=$item->options->price_type==1?
                $item->options->price:
                (($item->options->price/100)*$item->total_price);
            }else{
                $additional=$setting->type==1?$setting->price:(($setting->price/100)*$item->total_price);
            }
            @endphp
            {{ $item->total_price+$additional }}
        </div>
    </a>
</li>
@endforeach
{{-- Deal wise product disply div end --}}


</ul>
</section>
@endforeach
</main>
@stop

