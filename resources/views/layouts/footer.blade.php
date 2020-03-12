<?php
$user = \App\User::where('email', env('SYSTEM_EMAIL'))->first();
$header = \App\Display::where('user_id', $user->id)->first();
$footer = \App\Setting::where('user_id', $user->id)->first();
?>

<footer class="footer">
    <div class="footer-inner">
        <section class="footer-section">
            <div class="footer__logo">
                <img src="{{ asset($header?$header->logo:'assets/uploads/5621ad52/_.png') }}" alt="logo">
            </div>

            <div class="footer__address">
                <p>
                    {{ $footer? $footer->contact_info:'' }}
                </p>
                <p>Tel: {{ $footer? $footer->contact_phone:'' }}</p>
                <p>Email: {{ $footer? $footer->contact_email:'' }}</p>
            </div>

        </section>
        <section class="footer-section">
            <h3 class="footer__subtitle">
                Browse Stock:
            </h3>
            <ul>
                <li>
                    <a href="{{ URL::to('stocklist?maker_id=&model_no=&fuel_type=&drive_type=&price_from=0&price_to=9999999999999&veh_type=&steering=&transmission=&engine_capacity_from=0&engine_capacity_to=10000000000&year_from=1950&year_to=2020') }}">
                        Browse All Cars
                    </a>
                </li>
                @foreach(\App\ProductDeal::where('status',1)->get() as $item)
                <li><a href="{{ route('search_by_section',['id'=>$item->id,'name'=>strtolower(str_replace(' ','-',$item->name))]) }}">{{ $item->name }}</a></li>
                @endforeach
            </ul>
            <h3 class="footer__subtitle">
                Shop By Year :
            </h3>
            <ul>

                @for($i=2010; $i<= 2017; $i++)
                <li>
                    <a href="{{ route('search_by_years',['from'=>$i]) }}">{{ $i }} and Older</a>
                </li>
                @endfor

            </ul>
            <h3 class="footer__subtitle">
                Other Categories :
            </h3>
            <ul>
                <li><a href="{{ route('search_by_steering',['name'=>'left']) }}">Left Hand Drive</a></li>
                <li><a href="{{ route('search_by_fuel',['name'=>'diesel']) }}">Diesel</a></li>
                <li><a href="{{ route('search_by_transmission',['name'=>'manual']) }}">Manual</a></li>
            </ul>
        </section>
        <section class="footer-section">
            <h3 class="footer__subtitle">
                Shop By Make :
            </h3>
            <ul>
                @foreach( App\Company::find(['1','2','3','4','5','6','22','20','14','9','18','19','13','29','30']) as $item)
                <li>
                    <a href="{{ route('search_by_company',['id'=>$item->id,'name'=>str_replace(" ","-",strtolower($item->name))]) }}">{{ $item->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </section>
        <section class="footer-section">
            <h3 class="footer__subtitle">
                Shop By Type :
            </h3>
            <ul>
                @foreach(\App\VehicleType::all() as $item)
                <li>
                    <a href="{{ route('search_by_type',['id'=>$item->id,'name'=>str_replace(' ','-',strtolower($item->type))]) }}">
                        {{ $item->type }}
                    </a>
                </li>
                @endforeach
            </ul>
        </section>
        <section class="footer-section">
            <h3 class="footer__subtitle">
                Shop By Price :
            </h3>
            <ul>

                <li>
                    <a href="{{ route('search_by_price',['min'=>0,'max'=>500]) }}">
                        Under $500
                    </a>
                </li>

                @for($i=1; $i<=7 ;$i++)
                <li>
                    <a href="{{ route('search_by_price',['min'=>$i*500 ,'max'=> ($i+1)*500]) }}">
                        ${{ number_format($i*500) }}
                        -
                        ${{ number_format(($i+1)*500) }}
                    </a>
                </li>

                @endfor
                <li>
                    <a href="{{ route('search_by_price',['min'=>4000 ,'max'=> 99999999]) }}">
                        Over $4,000
                    </a>
                </li>

            </ul>


            <h3 class="footer__subtitle">
                About Us :
            </h3>
            <ul>
                <li><a href="{{ route('about-us') }}">Abount Us</a></li>
                <li><a href="{{ route('policy') }}">Privacy Policy</a></li>
                <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
            </ul>
        </section>

        <div class="footer__mobile">
            <div class="footer__mobile-logo">
                <img src="{{ asset($header?$header->logo:'assets/uploads/5621ad52/_.png') }}">
            </div>
            <div class="footer__mobile-section">
                <h3 class="footer__subtitle">Tel:</h3>
                <p>{{ $footer? $footer->contact_phone:'' }}</p>
            </div>
            <div class="footer__mobile-section">
                <h3 class="footer__subtitle">Email:</h3>
                <p>{{ $footer? $footer->contact_email:'' }}</p>
            </div>
            <div class="footer__mobile-section" style="width:100%;justify-content: center;">
                <h3 class="footer__subtitle">Address:</h3>
                <p>
                    {{ $footer? $footer->contact_info:'' }}
                </p>
            </div>
        </div>
    </div>
</footer>
