@extends('admin.layouts.app')
@section('content')
    <script src="{{ asset('assets/ckeditor5/16.0.0/classic/ckeditor.js') }}"></script>
    <div class="content-wrapper">
        <section class="content" style="padding-top: 20px">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row">
                        @if(Session::has('message'))
                            <div class="alert {{ Session::get('result')?'alert-success':'alert-danger' }}">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="box box-primary">
                        <form action="{{ route('admin.setting.update') }}" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Site Timezone:</label>
                                    <select name="timezone" id="" class="form-control">
                                        @for ($i = 0; $i <= 23; $i++)
                                            <option>UTC+{{$i<10?'0'.$i:$i}}:00</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Domain:</label>
                                    <input type="text" readonly class="form-control" value="{{ $user->domain }}">
                                </div>
                                <div class="form-group">
                                    <label>Page Title:</label>
                                    <input type="text" name="page_title" class="form-control" value="{{ $data->page_title }}">
                                </div>
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea name="description" cols="30" rows="5" class="form-control">{{ $data->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Keywords:</label>
                                    <textarea name="keywords" cols="30" rows="5" class="form-control" >{{ $data->keywords }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Contact Info:</label>
                                    <textarea name="contact_info" cols="30" rows="5" class="form-control">{{ $data->contact_info }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Contact Phone:</label>
                                    <input type="text" name="contact_phone" class="form-control" value="{{ $data->contact_phone }}">
                                </div>
                                <div class="form-group">
                                    <label>Contact Email:</label>
                                    <input type="text" name="contact_email" class="form-control" value="{{ $data->contact_email }}">
                                </div>
                                <div class="form-group">
                                    <label>GA tag:</label>
                                    <input type="text" name="ga_tag" class="form-control" value="{{ $data->ga_tag }}">
                                </div>
                                <div class="form-group">
                                    <label>Privacy Policy:</label>
                                    <textarea name="policy" id="policy" cols="30" rows="10" class="form-control">{{ $data->policy }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Terms & Conditions:</label>
                                    <textarea name="terms" id="terms" cols="30" rows="10" class="form-control">{{ $data->terms }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>About Us:</label>
                                    <textarea name="about_us" id="about-us" cols="30" rows="10" class="form-control">{{ $data->about_us }}</textarea>
                                </div>
                                <button type="submit" class="col-md-12 col-xs-12 btn btn-primary">Save</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#about-us' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#terms' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#policy' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop
