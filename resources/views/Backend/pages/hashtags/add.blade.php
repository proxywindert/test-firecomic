@extends('Backend.layouts.master')
@section('addtional_style')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/templates/css/comic/style.css') !!}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{trans('hashtag.title_header.add_comic')}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>{{trans('common.path.home')}}</a>
                </li>
                <li><a href="{{route('hashtags.list')}}">{{trans('hashtag.path.comic')}}</a></li>
                <li class="active">{{trans('hashtag.title_header.add_hashtag')}}</li>
            </ol>
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
                    <form role="form" method="POST" action="{{ route('hashtags.store') }}?XDEBUG_SESSION_START=19072">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body">

                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="comic_name">name</label>
                                        <input  type="text" class="form-control" id="name" name="name"
                                                  placeholder="name"/>
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
