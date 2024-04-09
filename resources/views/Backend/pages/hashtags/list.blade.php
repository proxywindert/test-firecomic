@extends('Backend.layouts.master')
@section('addtional_style')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/templates/css/comic/style.css') !!}">
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{trans('comic.title')}}
                <small>Nal solution</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{asset('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('common.path.home')}}</a>
                </li>
                <li><a href="{{ route('hashtags.list')}}"> {{trans('hashtags.path.team')}}</a></li>
                <li><a href="#">{{trans('common.path.list')}}</a></li>
            </ol>
        </section>
        <section class="content-header">
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#modal-search" id="clickCollapse">
                <span class="fa fa-search"></span>&nbsp;&nbsp;&nbsp;<span id="iconSearch" class="glyphicon"></span>
            </button>
        </section>

        <section class="content-header">
            <div>
                <button type="button" class="btn btn-info btn-default">
                    <a href="{{ route('hashtags.create')}}"><i class="fa fa-user-plus"></i>{{trans('common.button.add')}}
                    </a>
                </button>
            </div>
        </section>
        <!-- Main content -->
        <div id="msg"></div>
        <!-- Main content -->

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="comic-list" class="table table-bordered table-striped table-fit">
                                <thead>
                                <tr>
                                    <th>{{trans('hashtags.name')}}</th>
                                    <th>{{trans('hashtags.slug')}}</th>
                                    <th>{{trans('comic.edit')}}</th>
                                </tr>
                                </thead>
                                <tbody class="context-menu">
                                @foreach($hashtags as $hashtag)
                                    <tr class="comic-menu" id="hashtag-id-{{$hashtag->id}}"
                                        data-hashtag-id="{{$hashtag->id}}">
                                        <td class="comic-name">
                                            <span>{{$hashtag->name}}</span>
                                        </td>
                                        <td class="comic-name">
                                            <span>{{$hashtag->slug}}</span>
                                        </td>
                                        <td class="project-actions text-right">
{{--                                            <a class="btn btn-primary btn-sm" href="#">--}}
{{--                                                <i class="fas fa-folder">--}}
{{--                                                </i>--}}
{{--                                                View--}}
{{--                                            </a>--}}
                                            <a class="btn btn-info btn-sm" href="{{ route('hashtags.edit',['id'=>$hashtag->id]) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                               href="#"
                                               onclick="event.preventDefault();
                                                   document.getElementById('delete-form-{{ $hashtag->id }}').submit();"
                                            >
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                            <form id="delete-form-{{ $hashtag->id }}"
                                                  action="{{ route('hashtags.delete', ['id' => $hashtag->id]) }}?XDEBUG_SESSION_START=19655"
                                                  method="POST" style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection


