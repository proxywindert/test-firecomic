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
                <small>Firecomic</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('common.path.home')}}</a>
                </li>
            </ol>
        </section>
        <section class="content-header">
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#modal-search"
                    id="clickCollapse">
                <span class="fa fa-search"></span>&nbsp;&nbsp;&nbsp;<span id="iconSearch" class="glyphicon"></span>
            </button>
            @include('Backend.pages.comics._form_search_comics_list')
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
                                    <th>Hashtag</th>
                                    <th>{{trans('comic.link_banner')}}</th>
                                    <th>{{trans('comic.number_chapter')}}</th>
                                    <th>{{trans('common.edit')}}</th>
                                </tr>
                                </thead>
                                <tbody class="context-menu">
                                @foreach($comics as $comic)
                                    <tr class="comic-menu" id="comic-id-{{$comic->id}}"
                                        data-comic-id="{{$comic->id}}">

                                        <td class="comic-name">
                                            <span>{{$comic->comic_name}}</span>
                                        </td>
                                        <td class="comic-name">
                                            @foreach($comic->hashtags as $hashtag)
                                                <span
                                                    data-comic-id="{{ $comic->id }}"
                                                      data-hashtag-id="{{ $hashtag->id }}"
                                                      class="label-hashtag label {{ $hashtag?->is_main_tag?'label-warning':'label-success' }}">{{$hashtag->name}}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <img class="lazyload small-comic-img img-fluid"
                                                 src="{!! asset('assets/images/loadspinner.svg') !!}"
                                                 data-src="{{asset($comic->link_banner)}}"
                                                 alt="Photo">
                                        </td>
                                        <td class="comic-name">
                                            <span>{{count($comic->chapters)}}</span>
                                        </td>
                                        <td class="project-actions text-right">
                                            {{--                                            <a class="btn btn-primary btn-sm" href="#">--}}
                                            {{--                                                <i class="fas fa-folder">--}}
                                            {{--                                                </i>--}}
                                            {{--                                                View--}}
                                            {{--                                            </a>--}}
                                            <a class="btn btn-info btn-sm"
                                               href="{{ route('comics.edit',['code'=>$comic->comic_code]) }}">
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
                                                  action="{{ route('comics.delete', ['code' => $comic->comic_code]) }}?XDEBUG_SESSION_START=10538"
                                                  method="POST" style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                @if($comics->hasPages())
                                    <div class="col-sm-5">
                                        <div class="dataTables_info" style="float:left" id="example2_info" role="status"
                                             aria-live="polite">
                                            {{getInformationDataTable($comics)}}
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        {{  $comics->appends($param)->render('Backend.components.pagination.custom') }}
                                    </div>
                                @endif
                            </div>
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new IOlazy({
                image: 'img',
                threshold: 0.4
            });
        });
        let hashtags = document.querySelectorAll('span[class^="label-hashtag"]');
        const context = {
            'X-CSRF-TOKEN': `{{ csrf_token() }}`,
            'X-HTTP-Method-Override': 'GET'
        }
        hashtags.forEach(item =>{
            item.addEventListener('click',(event)=>{
                document.getElementById('preloader').setAttribute("style", "display:block");

                apiGet(context,`/ajax/admin/comics/${item.getAttribute('data-comic-id')}/hashtags/${item.getAttribute('data-hashtag-id')}?XDEBUG_SESSION_START=12915`)
                .then(response =>{
                    showToast(response.data.message, "success", 5000);
                    let parentElement = item.parentNode;
                    parentElement.querySelectorAll('span').forEach(item=>{
                        item.classList.remove("label-warning");
                        item.classList.remove("label-success");
                        item.classList.add("label-success");
                    })
                    item.classList.remove("label-success");
                    item.classList.add("label-warning");

                    document.getElementById('preloader').setAttribute("style", "display:none");
                })
                .catch(error=>{
                    document.getElementById('preloader').setAttribute("style", "display:none");
                    // Xử lý lỗi nếu có
                    showToast(error.response.data.message, "danger", 5000);
                })
            })
        })
    </script>
@endsection

