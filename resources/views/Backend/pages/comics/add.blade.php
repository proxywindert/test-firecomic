@extends('Backend.layouts.master')
@section('addtional_style')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/templates/css/comic/style.css') !!}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{trans('comic.title_header.add_comic')}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>{{trans('common.path.home')}}</a>
                </li>
                <li><a href="{{route('comics.list')}}">{{trans('comic.path.comic')}}</a></li>
                <li class="active">{{trans('comic.title_header.add_comic')}}</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Comics</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="msg">
                        @if(session()->get('msgSuccess'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                {{ session()->get('msgSuccess') }}
                            </div>
                        @endif
                        @if(session()->get('msgFail'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                {{ session()->get('msgFail') }}
                            </div>
                        @endif

                    </div>
                    <form id="form-add-commic" role="form" method="POST"
                          action="{{ route('comics.store') }}?XDEBUG_SESSION_START=19919"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body">

                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="comic_name">Nội dung tóm tắt</label>
                                        <textarea rows="6" class="form-control" id="summary_contents"
                                                  name="summary_contents"
                                                  placeholder="summary_contents">{!! old('summary_contents', isset($comic["summary_contents"]) ? $comic["summary_contents"] : null) !!}</textarea>
                                        <label id="lb_error_summary_contents"
                                               style="color: red;">{{$errors->first('summary_contents')}}</label>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="comic_name">comic_name</label>
                                        <input
                                            value="{!! old('comic_name', isset($comic["comic_name"]) ? $comic["comic_name"] : null) !!}"
                                            type="text" class="form-control" id="comic_name" name="comic_name"
                                               placeholder="comic_name">
                                        <label id="lb_error_comic_name"
                                               style="color: red;">{{$errors->first('comic_name')}}</label>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="bg_color">bg_color</label>
                                        <input
                                            value="{!! old('bg_color', isset($comic["bg_color"]) ? $comic["bg_color"] : null) !!}"
                                            type="text" class="form-control" id="bg_color" name="bg_color"
                                               placeholder="bg_color">
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="tranfer_color">tranfer_color</label>
                                        <input
                                            value="{!! old('tranfer_color', isset($comic["tranfer_color"]) ? $comic["tranfer_color"] : null) !!}"
                                            type="text" class="form-control" id="tranfer_color" name="tranfer_color"
                                               placeholder="tranfer_color">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="link_avatar">link_avatar</label>
                                        <input type="file" name="link_avatar" id="link_avatar">
                                        <p class="help-block">link_avatar.</p>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="link_banner">link_banner</label>
                                        <input type="file" name="link_banner" id="link_banner">
                                        <p class="help-block">link_banner.</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="link_comic_name">link_comic_name</label>
                                        <input type="file" name="link_comic_name" id="link_comic_name">
                                        <p class="help-block">link_comic_name.</p>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="link_comic_small_name">link_comic_small_name</label>
                                        <input type="file" name="link_comic_small_name" id="link_comic_small_name">
                                        <p class="help-block">link_comic_small_name.</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="link_bg">link_bg</label>
                                        <input type="file" name="link_bg" id="link_bg">
                                        <p class="help-block">link_bg.</p>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label>tagged
{{--                                            {{ dd(old('tagged')) }}--}}
                                        </label><br/>
                                        <select multiple class="form-control select2 width80" name="tagged[]" id="tagged">
                                            @foreach($hashtags as $hashtag)
                                                <option
                                                    value="{{ $hashtag->id }}"
                                                    {{ (in_array($hashtag->id ,old('tagged',[])))?'selected="selected"':'' }}
                                                >
                                                    {{ $hashtag->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label id="lb_error_id_hashtag"
                                               style="color: red; ">{{$errors->first('hashtag')}}</label>
                                    </div>
                                </div>

                            </div>


                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>

                <!-- /.row -->
            </div>
            <!-- /.box-body -->

            <!-- /.box -->
        </section>
    </div>
@endsection
@section('addtional_scripts')
    <script
        src="{!! asset('assets/admin/templates/js/bower_components/select2/dist/js/select2.full.min.js') !!}"></script>
    <script>
        $(document).ready(function () {
            $('#tagged').select2({
                multiple: true,
            });
            $('#form-add-commic').submit((event) => {
                document.getElementById('preloader').setAttribute("style", "display:block");
            })
        })

    </script>
@endsection
