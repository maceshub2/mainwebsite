@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content" style="padding-top: 20px">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="row">
                        @if(Session::has('message'))
                            <div class="alert {{ Session::get('result')?'alert-success':'alert-danger' }}">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="box-header" style="text-align: center">
                                <h3>
                                    Update Your Password
                                </h3>
                            </div>
                            @if ($errors->any())
                                <div style="color: red">
                                    @foreach($errors->all() as $error)
                                    {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{ route('admin.password.update') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Current Password :</label>
                                    <input type="password" name="current" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Password :</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password :</label>
                                    <input type="password" name="c_password" class="form-control" required>
                                </div>
                                <br><br>
                                <button type="submit" class="col-md-12 col-xs-12 btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
