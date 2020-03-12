<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

    <title>Japanese Used Cars | VIGO4u Japan</title>
    <meta name="description" content="Vigo4u-japan provids nice cars...">
    <meta name="keywords" content="Used cars, Second hand">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    @include('layouts.head')
    <?php
    $user=\App\User::where('email',env('SYSTEM_EMAIL'))->first();
    $header = \App\Display::where('user_id', $user->id)->first();
    ?>
    <style>
        :root {
            --light-color: {{ $header?$header->bright_color:'#DE2911' }};
            --dark-color:  {{ $header?$header->dark_color:'#000000' }};
        }
        .filter-options__btn{
            background-color: var(--light-color) !important;
            margin-top: -30px !important;
        }
        .header {
            background-color: var(--dark-color);
        }

        .footer {
            background-color:var(--dark-color);
        }

        .footer__subtitle {
            color: var(--light-color);
        }

        .module__title:after {
            border-bottom: solid 2px var(--light-color);
        }

        .home-car__price {
            color: var(--light-color);
        }

        .searchbar__bg {
            background-color: var(--light-color);
            opacity: .1;
        }

        .searchbar__input {
            border-color: var(--light-color);
        }

        .searchbar__btn {
            background-color: var(--light-color);
        }

        .searchbar__link {
            color: var(--light-color);
        }

        .search__item-price {
            color: var(--light-color);
        }

        .search__item-inquiry {
            border-color: var(--light-color);
            color: var(--light-color);
        }

        .search__item-inquiry:hover {
            background-color: var(--light-color);
        }

        .detail__now-price {
            color: var(--light-color);
        }

        .bf-btn {
            background-color:var(--light-color);
        }

        .inquiry-btn {
            background-color: var(--light-color);
        }

        .radio-group input:checked + span {
            background-color:var(--light-color);
        }

        .filter-checkbox input[type=checkbox]:checked + label {
            background-color: var(--light-color);
        }

        sup {
            color:var(--light-color);
        }

        .popup_head {
            background-color: var(--dark-color);
        }

        .popup-btns__search {
            background-color: var(--light-color);
        }

        .home__banner {
            background-color: var(--dark-color);
        }

        .home__searchbar .searchbar-inner {
            background-color: var(--dark-color);
        }

        .header__section li span {
            color: var(--light-color);
        }

        .header__icon div {
            background-color: var(--light-color);
        }

        .home__filters {
            background-color: var(--dark-color);
        }

        .filter-options__btn {
            color: var(--light-color);
        }
        .alert {
            position: relative;
            padding: .75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-dismissible {
            padding-right: 4rem;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
    @yield('css')
</head>
<body>
    <div class="canvas">
        @include('layouts.header')
        @yield('banner')
        <div class="content">

            @yield('sidebar')

            @yield('pop-up')
            
            @yield('content')
        </div>
    </div>
    @include('layouts.footer')
    @yield('js')
    @include('layouts.foot')
    @include('components.search-data')
</body>
</html>
