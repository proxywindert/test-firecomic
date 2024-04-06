@extends('Backend.layouts.master')
@section('addtional_style')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/templates/css/comic/style.css') !!}">
@endsection
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{trans('comic.title_header.edit_comic')}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> {{trans("common.path.home")}}</a></li>
                <li><a href="{{route('comics.list')}}">{{trans("comic.path.comic")}}</a></li>
                <li class="active">{{trans('comic.title_header.edit_comic')}}</li>
            </ol>
        </section>
        <section class="content-header">
            <div>
                <button type="button" class="btn btn-info btn-default">
                    <a href="{{ route('comics.create')}}"><i class="fa fa-user-plus"></i>{{trans('common.button.add_chapter')}}
                    </a>
                </button>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Comics</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="msg">
                        {{ session()->get('msg') }}
                    </div>
                    <form role="form" method="POST" action="{{ route('comics.patch',['code'=>$comic->comic_code]) }}?XDEBUG_SESSION_START=19407" enctype="multipart/form-data">
                        @method('PATCH')
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="comice_code" value="{{$comic["comice_code"]}}"/>
                        <div class="box-body">
                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="comic_name">Nội dung tóm tắt</label>
                                        <textarea
                                            value="{!! old('summary_contents', isset($comic["summary_contents"]) ? $comic["summary_contents"] : null) !!}"
                                            rows="6" class="form-control" id="summary_contents" name="summary_contents"
                                            placeholder="summary_contents"> </textarea>
                                        <label id="lb_error_summary_contents" style="color: red;">{{$errors->first('summary_contents')}}</label>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="comic_name">comic_name</label>
                                        <input
                                            value="{!! old('comic_name', isset($comic["comic_name"]) ? $comic["comic_name"] : null) !!}"
                                            type="text" class="form-control" id="comic_name" name="comic_name"
                                            placeholder="comic_name">
                                        <label id="lb_error_comic_name" style="color: red;">{{$errors->first('comic_name')}}</label>
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                               <div class="col col-md-6">

                                   <div class="form-group">
                                       <label for="bg_color">bg_color</label>
                                       <input
                                           value="{!! old('comic_name', isset($comic["bg_color"]) ? $comic["bg_color"] : null) !!}"
                                           type="text" class="form-control" id="bg_color" name="bg_color"
                                           placeholder="bg_color">
                                       <label id="lb_error_bg_color" style="color: red;">{{$errors->first('bg_color')}}</label>
                                   </div>
                               </div>
                               <div class="col col-md-6">
                                   <div class="form-group">
                                       <label for="tranfer_color">tranfer_color</label>
                                       <input
                                           value="{!! old('tranfer_color', isset($comic["tranfer_color"]) ? $comic["tranfer_color"] : null) !!}"
                                           type="text" class="form-control" id="tranfer_color" name="tranfer_color"
                                           placeholder="tranfer_color">
                                       <label id="lb_error_tranfer_color" style="color: red;">{{$errors->first('tranfer_color')}}</label>
                                   </div>
                               </div>
                           </div>

                          <div class="row">
                              <div class="col col-md-6">
                                  <div class="form-group">
                                      <img class="small-comic-img img-responsive" src="{!! asset(old('link_avatar', isset($comic["link_avatar"]) ? $comic["link_avatar"] : null)) !!}" alt="Photo">
                                      <label for="link_avatar">link_avatar</label>
                                      <input type="file" name="link_avatar" id="link_avatar">
                                      <p class="help-block">link_avatar.</p>
                                  </div>
                              </div>
                              <div class="col col-md-6">
                                  <div class="form-group">
                                      <img class="small-comic-img img-responsive" src="{!! asset(old('link_banner', isset($comic["link_banner"]) ? $comic["link_banner"] : null)) !!}" alt="Photo">
                                      <label for="link_banner">link_banner</label>
                                      <input type="file" name="link_banner" id="link_banner">
                                      <p class="help-block">link_banner.</p>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col col-md-6">
                                  <div class="form-group">
                                      <img class="small-comic-img img-responsive" src="{!! asset(old('link_comic_name', isset($comic["link_comic_name"]) ? $comic["link_comic_name"] : null)) !!}" alt="Photo">
                                      <label for="link_comic_name">link_comic_name</label>
                                      <input type="file" name="link_comic_name" id="link_comic_name">
                                      <p class="help-block">link_comic_name.</p>
                                  </div>
                              </div>
                              <div class="col col-md-6">
                                  <div class="form-group">
                                      <img class="small-comic-img img-responsive" src="{!! asset(old('link_comic_small_name', isset($comic["link_comic_small_name"]) ? $comic["link_comic_small_name"] : null)) !!}" alt="Photo">
                                      <label for="link_comic_small_name">link_comic_small_name</label>
                                      <input type="file" name="link_comic_small_name" id="link_comic_small_name">
                                      <p class="help-block">link_comic_small_name.</p>
                                  </div>
                              </div>
                          </div>

                            <div class="form-group">
                                <img class="small-comic-img img-responsive" src="{!! asset(old('link_bg', isset($comic["link_bg"]) ? $comic["link_bg"] : null)) !!}" alt="Photo">
                                <label for="link_bg">link_bg</label>
                                <input type="file" name="link_bg" id="link_bg">
                                <p class="help-block">link_bg.</p>
                            </div>

                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </div>
                    </form>
                </div>

                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Chapter</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="msg">
                        {{ session()->get('msg') }}
                    </div>
                </div>

                <!-- /.row -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>


@endsection

