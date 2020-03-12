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
<main class="home__main">
    <section class="module">
        <h2 class="module__title">New Arrivals</h2>
        <ul class="home-car__list" id="new_arrivals">
        </ul>
    </section>
    <section class="module">
        <h2 class="module__title">Best Deal$ : </h2>
        <ul class="home-car__list" id="best_deals">
        </ul>
    </section>
    <section class="module">
        <h2 class="module__title">Discount : </h2>
        <ul class="home-car__list" id="discount">
        </ul>
    </section>
    <section class="module">
        <h2 class="module__title">recommended : </h2>
        <ul class="home-car__list" id="recommended">
        </ul>
    </section>

</main>
<script>
    $(document).ready(function () {
        const base_url='http://127.0.0.1:8001/api/';
        fetch(base_url+'product/new_arrivals',{method: 'GET',})
        .then(res => res.json())
        .then(json => {
            let new_arrival=[];
            let data='';

            new_arrival=json['products'];
            for (i=0 ;i< json['products'].length ;i++){
                data+='<li class="home-car__item">\n' +
                '                        <a href="#">\n' +
                '                            <div class="home-car__img">\n' +
                '                                <img' +
                '                                    src="http://127.0.0.1:8001/'+new_arrival[i]['display_pic']+'"' +
                '                                    alt="NISSAN Teana">' +
                '                            </div>\n' +
                '                            <div class="home-car__title">'+new_arrival[i]['company_name']+'</div>\n' +
                '                            <div class="home-car__title">'+new_arrival[i]['model_name']+'</div>\n' +
                '                            <div class="home-car__price">Vehicle Price:$ ' +  new_arrival[i]['total_price'] +
                '                            </div>\n' +
                '                        </a>\n' +
                '                    </li>';
            }
            $('#new_arrivals').html(data);
        });

        let array={
            best_deal: [7,9,10],
            discount: [7,9,10],
            recommended: [7,9,10],
        };

        get_products(array['best_deal'],'best_deals');
        get_products(array['discount'],'discount');
        get_products(array['recommended'],'recommended');

        function get_products(array,id) {
            let string='';
            for (i=0;i < array.length;i++){
                string+='data[]='+array[i]+'&';
            }
            fetch(base_url+'product/required?'+string)
            .then(res =>res.json())
            .then(json =>{
                let products=json['products'];
                let data='';
                for (i=0 ;i< json['products'].length ;i++){
                    data+='<li class="home-car__item">\n' +
                    '                        <a href="#">\n' +
                    '                            <div class="home-car__img">\n' +
                    '                                <img' +
                    '                                    src="http://127.0.0.1:8001/'+products[i]['display_pic']+'"' +
                    '                                    alt="NISSAN Teana">' +
                    '                            </div>\n' +
                    '                            <div class="home-car__title">'+products[i]['company_name']+'</div>\n' +
                    '                            <div class="home-car__title">'+products[i]['model_name']+'</div>\n' +
                    '                            <div class="home-car__price">Vehicle Price:$ ' +  products[i]['total_price'] +
                    '                            </div>\n' +
                    '                        </a>\n' +
                    '                    </li>';
                }
                $('#'+id).html(data);
            });
        }
    });
</script>

@stop
