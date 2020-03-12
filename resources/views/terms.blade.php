@extends('layouts.app')
@section('content')
    <?php
    $user = \App\User::where('email', env('SYSTEM_EMAIL'))->first();
    $content = \App\Setting::where('user_id', $user->id)->first();
    ?>
    <div class="content">

        <article>
            <h1>Terms & Conditions</h1>
            <p>
                @php
                    echo $content?$content->terms:'';
                @endphp
            </p>
        </article>

    </div>
@endsection
