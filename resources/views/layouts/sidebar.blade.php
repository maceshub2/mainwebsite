<aside class="nav-aside">

    <section class="module">
        <h2 class="module__title">Shop By Make</h2>
        <ul class="nav-aside__list">
         @foreach( App\Company::find(['1','2','3','4','5','6','22','20','14','9','18','19','13','29','30']) as $item)

         <li class="nav-aside__cell">
            <a href="{{ route('search_by_company',['id'=>$item->id,'name'=>str_replace(" ","-",strtolower($item->name))]) }}">
                <div class="nav-aside__img">
                    <span class="make make-{{ strtolower($item->name)}}"></span>
                </div>
                <div class="nav-aside__title">{{ $item->name }}</div>
            </a>
        </li>
        @endforeach
    </ul>
</section>


<section class="module">
    <h2 class="module__title">Shop By Price</h2>

    <ul class="nav-aside__list">
        <li class="nav-aside__cell">
            <a href="{{ route('search_by_price',['min'=>0,'max'=>500]) }}">
                <div class="nav-aside__img">
                    <i class="material-icons">attach_money</i>
                </div>
                <div class="nav-aside__title">Under - $500</div>
            </a>
        </li>
        @for($i=1; $i<=7 ;$i++)
        <li class="nav-aside__cell">
            <a href="{{ route('search_by_price',['min'=>$i*500 ,'max'=> ($i+1)*500]) }}">
                <div class="nav-aside__img">
                    <i class="material-icons">attach_money</i>
                </div>
                <div class="nav-aside__title"> 
                    ${{ number_format($i*500) }}
                    -
                    ${{ number_format(($i+1)*500) }}
                </div>
            </a>
        </li>
        @endfor

        <li class="nav-aside__cell">
            <a href="{{ route('search_by_price',['min'=>4000 ,'max'=> 99999999]) }}">
                <div class="nav-aside__img">

                    <i class="material-icons">attach_money</i>

                </div>
                <div class="nav-aside__title">Over $4,000</div>
            </a>
        </li>

    </ul>

</section>


</aside>
