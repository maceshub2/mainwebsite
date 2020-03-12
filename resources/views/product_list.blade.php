@extends('layouts.app')

@section('banner')
@include('components/search2')
@stop

@section('pop-up')
@include('components.search-pop')
@stop


@section('sidebar')
@include('layouts.sidebar')
@stop



@section('content')
<?php
$setting=\App\AdditionalPrice::find(1);
?>
<main class="search__main" style="margin-top: 10px">

  <section class="module">
    <h2 class="module__title">Results: {{ number_format(count($data)) }}</h2>
   {{--  <div class="module__vendor">
      <label for="sort">Sort by:</label>
      <div class="search__sort-container">
        <i class="material-icons">arrow_drop_down</i>
        <select name="sort" id="sort" class="searchbar__select" title="sort">


          <option value="year_asc">Year Old to New</option>

          

          <option value="mileage_desc">Mileage High to Low</option>

          

          <option value="price_desc">Price High to Low</option>

          

          <option value="price_asc">Price Low to High</option>

          

          <option value="mileage_asc">Mileage Low to High</option>

          

          <option value="publish_date_desc">New Arrivals</option>

          

          <option value="year_desc">Year New to Old</option>

          
        </select>
      </div>
    </div> --}}
  </section>
  

  <ul class="search__list">
    @foreach ($data as $item)
    <li class="search__item" style="margin: 11px">
      <div class="search__item-suffix">
        <i class="material-icons">chevron_right</i>
      </div>

      <a href="{{ route('show.product',['ref_no' => $item->ref_no]) }}">
        <div class="search__img">
          <img src="{{ env('MAIN_APP_URL') }}{{$item->photo?$item->photo->path:'assets/main/NO_image.png'}}" alt="{{ $item->product_company?$item->product_company->name:'' }}
          {{ $item->product_model?$item->product_model->model:'' }}">
        </div>
        <div class="search__item-vendor">
          <h2 class="search__item-title">
            {{ $item->product_company?$item->product_company->name:'' }}
            {{ $item->product_model?$item->product_model->model:'' }}
          </h2>

          @php
          if($item->options && $item->options->price_type!=0){
            $additional=$item->options->price_type==1?
            $item->options->price:
            (($item->options->price/100)*$item->total_price);
          }else{
            $additional=$setting->type==1?$setting->price:(($setting->price/100)*$item->total_price);
          }
          @endphp
          
          <span class="search__item-price">Vehicle Price: ${{ number_format($item->total_price+$additional) }}
          </span>
          <div class="search__item-meta">{{ $item->mileage }} / {{ $item->steering }} / {{ $item->transmission }} / {{ $item->engine_cc }}cc / {{ str_replace('/','-', $item->registration_date) }}
          </div>
        </div>
      </a>
      <a class="search__item-inquiry" href="{{ route('show.product',['ref_no' => $item->ref_no]) }}">
        <i class="material-icons">mail_outline</i>
        INQUERY
      </a>
    </li>
    @endforeach 

    <div  class="pg">
      <ul class="pg__list" id="pagin">
        <ul>
        </div>          
      </ul>
    </section>


  </main>
  <script type="text/javascript">

  //Pagination
  pageSize = 12;
  incremSlide = 10;
  startPage = 0;
  numberPage = 0;

  var pageCount =  $(".search__item").length / pageSize;
  var totalSlidepPage = Math.floor(pageCount / incremSlide);

  for(var i = 0 ; i<pageCount;i++){
    $("#pagin").append('<li><a href="javascript:void(0)">'+(i+1)+'</a></li> ');
    if(i>pageSize){
     $("#pagin li").eq(i).hide();
   }
 }

 var prev = $("<li/>").addClass("prev pg__btn").html("Prev").click(function(){
   startPage-=5;
   incremSlide-=5;
   numberPage--;
   slide();
 });

 prev.hide();

 var next = $("<li/>").addClass("next pg__btn").html("Next").click(function(){
   startPage+=5;
   incremSlide+=5;
   numberPage++;
   slide();
 });

 $("#pagin").prepend(prev).append(next);

 $("#pagin li").first().find("a").addClass("current");

 slide = function(sens){
   $("#pagin li").hide();
   
   for(t=startPage;t<incremSlide;t++){
     $("#pagin li").eq(t+1).show();
   }
   if(startPage == 0){
     next.show();
     prev.hide();
   }else if(numberPage == totalSlidepPage ){
     next.hide();
     prev.show();
   }else{
     next.show();
     prev.show();
   }
 }

 showPage = function(page) {
  $(".search__item").hide();
  $(".search__item").each(function(n) {
    if (n >= pageSize * (page - 1) && n < pageSize * page)
      $(this).show();
  });        
}

showPage(1);
$("#pagin li a").eq(0).addClass("current");

$("#pagin li a").click(function() {
 $("#pagin li a").removeClass("current");
 $(this).addClass("current");
 showPage(parseInt($(this).text()));
});

</script>
@stop
