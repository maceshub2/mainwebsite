@extends('admin.layouts.app')
@section('content')
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
                        <div class="box-body">
                            <div class="form-group">
                                <label>Logo :</label><br>
                                <img src="{{ $data->logo?asset($data->logo):'http://www.vigo4u-japan.com/uploads/5621ad52/_.png' }}"
                                     data-src="{{ $data->logo?asset($data->logo):'http://www.vigo4u-japan.com/uploads/5621ad52/_.png' }}" id="logo_img" alt="">
                            </div>
                            <div class="form-group">
                                <label>Banner :</label><br>
                                <img src="{{ $data->banner?asset($data->banner):'http://www.vigo4u-japan.com/uploads/7367b8fb/_.jpg' }}"
                                     data-src="{{ $data->banner?asset($data->banner):'http://www.vigo4u-japan.com/uploads/7367b8fb/_.jpg' }}"
                                     id="banner_img" alt="" style="width: 100%">
                            </div>

                            <form action="{{ route('admin.display.update') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Main Bright Color:</label>
                                    <input type="color" name="bright_color" class="form-control" value="{{ $data->bright_color }}">
                                </div>
                                <div class="form-group">
                                    <label>Main Dark Color:</label>
                                    <input type="color" name="dark_color" class="form-control" value="{{ $data->dark_color }}">
                                </div>
                                <fieldset style="border: 2px solid #3C8DBC; padding: 20px">
                                    <legend style="color: #3C8DBC"> &nbsp;Primary Information:</legend>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="text" name="info_1" class="form-control" value="{{ $data->info_1 }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone:</label>
                                        <input type="text" name="info_2" class="form-control" value="{{ $data->info_2 }}">
                                    </div>
                                </fieldset>
                                <br>
                                <fieldset style="border: 2px solid #3C8DBC; padding: 20px">
                                    <legend style="color: #3C8DBC"> &nbsp;Secondary infomation:</legend>
                                    @for ($i = 1; $i <= 4; $i++)
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="s_option_{{$i}}" id="s_option_{{$i}}" class="form-control">
                                                    <option></option>
                                                    @foreach(\App\Account::all() as $item)
                                                        <option>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <?php
                                                $val=explode('::',$data['s_info_'.$i]);
                                            ?>
                                            <script>
                                                $('document').ready(function () {
                                                    $('#s_option_{{$i}}').val('{{ isset($val[0])?$val[0]:"" }}');
                                                });
                                            </script>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="s_info_{{$i}}" value="{{ isset($val[1])?$val[1]:'' }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </fieldset>
                                <br>
                                <fieldset style="border: 2px solid #3C8DBC; padding: 20px">
                                    <legend style="color: #3C8DBC"> &nbsp;ICON infomation:</legend>
                                    @for ($i = 1; $i <= 3; $i++)
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="icon_option_{{$i}}" id="" class="form-control">
                                                    <option></option>
                                                    @foreach(\App\Account::all() as $item)
                                                        <option>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <?php
                                                $val=explode('::',$data['icon_'.$i]);
                                            ?>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="icon_{{$i}}" class="form-control" value="{{ isset($val[1])?$val[1]:'' }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </fieldset>
                                <br><br>
                                <button type="submit" class="col-md-12 col-xs-12 btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.display.update.image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title"></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="" alt="" style="height: auto; width: 100%" id="modal_img">
                        <input type="file" name="file" class="form-control" accept="image/*">
                    </div>
                    <input type="hidden" name="type" value="" id="img_type">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#logo_img').on('click',function () {
                $('.modal-header h3').html('Upload New Logo...');
                $('#modal_img').attr('src', $(this).attr('data-src'));
                $('#img_type').val('logo');
                $('.modal').modal('show');
            });
            $('#banner_img').on('click',function () {
                $('.modal-header h3').html('Upload New Header...');
                $('#modal_img').attr('src', $(this).attr('data-src'));
                $('#img_type').val('banner');
                $('.modal').modal('show');
            });
        });
    </script>
@stop
