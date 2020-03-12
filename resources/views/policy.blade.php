@extends('layouts.app')
@section('content')
    <?php
    $user = \App\User::where('email', env('SYSTEM_EMAIL'))->first();
    $content = \App\Setting::where('user_id', $user->id)->first();
    ?>
    <div class="content">

        <article>
            <h1>Privacy Policy</h1>
            <p>
                @php
                    echo $content?$content->policy:'';
                @endphp
            </p>
        </article>

    </div>
@endsection
