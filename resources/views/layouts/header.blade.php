<?php
$user = \App\User::where('email', env('SYSTEM_EMAIL'))->first();
$header = \App\Display::where('user_id', $user->id)->first();
?>
<header class="header">
    <div class="header-inner">
        <a href="/" class="header__logo">
            <img src="{{asset($header?$header->logo:'assets/uploads/5621ad52/_.png')}}" alt="logo">
        </a>
        @if($header)
            <ul class="header__section header__section--1">
                @if($header->info_1)
                    <li>
                        <a href="mailto:{{ $header->info_1 }}" class="header__icon header__icon--medium">
                            <div></div>
                            <img src="{{ asset('assets/icns/mail.svg') }}">
                        </a>
                        <a href="mailto:{{ $header->info_1 }}">
                            <span class="header__key">Email:</span> {{ $header->info_1 }}
                        </a>
                    </li>
                @endif
                @if($header->info_2)

                    <li>
                        <a href="tel:{{ $header->info_2 }}" class="header__icon header__icon--medium">
                            <div></div>
                            <img src="{{ asset('assets/icns/phone.svg') }}">
                        </a>

                        <a href="tel:{{ $header->info_2 }}">
                            <span class="header__key">Phone:</span> {{ $header->info_2 }}
                        </a>
                    </li>
                @endif
            </ul>


            <ul class="header__section header__section--2">
                @for ($i = 1; $i < 5; $i++)
                    @if($header['s_info_'.$i])
                        <?php
                            $info=explode('::',$header['s_info_'.$i]);
                        ?>
                    <li>
                        <a href="tel:{{ isset($info[1])?$info[1]:'' }}">
                            <span class="header__key">{{ isset($info[0])?$info[0]:'' }}:</span> {{isset($info[1])?$info[1]:''}}
                        </a>
                    </li>
                    @endif
                @endfor
            </ul>

            <ul class="header__section header__section--3">
                <li>
                    <a href="https://www.facebook.com/bangkokvigo" class="header__icon" target="_blank">
                        <div></div>
                        <img src="{{ asset('assets/icns/facebook.svg') }}">
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/user/vigobangkok" class="header__icon" target="_blank">
                        <div></div>
                        <img src="{{ asset('assets/icns/youtube.svg') }}">
                    </a>
                </li>
            </ul>

        @endif
    </div>
</header>
