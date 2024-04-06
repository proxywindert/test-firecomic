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
                <li><a href="{{ route('comics.list')}}"> {{trans('comic.path.team')}}</a></li>
                <li><a href="#">{{trans('common.path.list')}}</a></li>
            </ol>
        </section>
        <section class="content-header">
            <div>
                <button type="button" class="btn btn-info btn-default">
                    <a href="{{ route('comics.create')}}"><i class="fa fa-user-plus"></i>{{trans('common.button.add')}}
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
                                    <th>{{trans('comic.name')}}</th>
                                    <th>{{trans('comic.link_banner')}}</th>
                                    <th>{{trans('comic.edit')}}</th>
                                </tr>
                                </thead>
                                <tbody class="context-menu">
                                @foreach($comics as $comic)
                                    <tr class="comic-menu" id="comic-id-{{$comic->id}}"
                                        data-comic-id="{{$comic->id}}">
                                        <td class="comic-name">
                                            <span>{{$comic->comic_name}}</span>
                                        </td>
                                        <td>
                                            <img class="small-comic-img img-fluid" src="{{asset($comic->link_banner)}}"
                                                 alt="Photo">
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{ route('comics.edit',['code'=>$comic->comic_code]) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                               href="#"
                                               onclick="event.preventDefault();
                                                   document.getElementById('delete-form-{{ $comic->comic_code }}').submit();"
                                            >
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                            <form id="delete-form-{{ $comic->comic_code }}"
                                                  action="{{ route('comics.delete', ['code' => $comic->comic_code]) }}?XDEBUG_SESSION_START=19407"
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


@section('addtional_scripts')
    <script src="{!! asset('assets/admin/templates/js/bower_components/jquery/dist/jquery.min.js') !!}"></script>
@endsection

