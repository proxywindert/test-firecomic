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
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> {{trans("common.path.home")}}</a>
                </li>
                <li><a href="{{route('comics.list')}}">{{trans("comic.path.comic")}}</a></li>
                <li class="active">{{trans('comic.title_header.edit_comic')}}</li>
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
                    <form
                        id="form-edit-comic"
                        role="form" method="POST"
                        action="{{ route('comics.patch',['code'=>$comic->comic_code]) }}?XDEBUG_SESSION_START=16783"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="comice_code" value="{{$comic["comice_code"]}}"/>
                        <div class="box-body">
                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="comic_name">Nội dung tóm tắt</label>
                                        <textarea
                                            rows="6" class="form-control" id="summary_contents" name="summary_contents"
                                            placeholder="summary_contents"> {!! old('summary_contents', $comic?->summaryContents?->content?? null) !!}</textarea>
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
                                            value="{!! old('comic_name', isset($comic["bg_color"]) ? $comic["bg_color"] : null) !!}"
                                            type="text" class="form-control" id="bg_color" name="bg_color"
                                            placeholder="bg_color">
                                        <label id="lb_error_bg_color"
                                               style="color: red;">{{$errors->first('bg_color')}}</label>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label>tagged</label><br/>
                                        <select multiple class="form-control select2 width80" name="tagged[]"
                                                id="tagged">

                                            @foreach($hashtags as $hashtag)
                                                <option
                                                    value="{{ $hashtag->id }}"
                                                    {{ (is_array(getArray($comic?->hashtags)) && in_array($hashtag->id ,getArray($comic->hashtags)))?'selected="selected"':'' }}
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

                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <img class="small-comic-img img-responsive"
                                             src="{!! asset(old('link_avatar', isset($comic["link_avatar"]) ? $comic["link_avatar"] : null)) !!}"
                                             alt="Photo">
                                        <label for="link_avatar">link_avatar</label>
                                        <input type="file" name="link_avatar" id="link_avatar">
                                        <p class="help-block">link_avatar.</p>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <img class="small-comic-img img-responsive"
                                             src="{!! asset(old('link_banner', isset($comic["link_banner"]) ? $comic["link_banner"] : null)) !!}"
                                             alt="Photo">
                                        <label for="link_banner">link_banner</label>
                                        <input type="file" name="link_banner" id="link_banner">
                                        <p class="help-block">link_banner.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <img class="small-comic-img img-responsive"
                                             src="{!! asset(old('link_comic_name', isset($comic["link_comic_name"]) ? $comic["link_comic_name"] : null)) !!}"
                                             alt="Photo">
                                        <label for="link_comic_name">link_comic_name</label>
                                        <input type="file" name="link_comic_name" id="link_comic_name">
                                        <p class="help-block">link_comic_name.</p>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <img class="small-comic-img img-responsive"
                                             src="{!! asset(old('link_comic_small_name', isset($comic["link_comic_small_name"]) ? $comic["link_comic_small_name"] : null)) !!}"
                                             alt="Photo">
                                        <label for="link_comic_small_name">link_comic_small_name</label>
                                        <input type="file" name="link_comic_small_name" id="link_comic_small_name">
                                        <p class="help-block">link_comic_small_name.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col col-md-6">
                                    <div class="form-group">

                                            <img class="small-comic-img img-responsive"
                                                 src="{!! asset(old('link_bg', isset($comic["link_bg"]) ? $comic["link_bg"] : null)) !!}"
                                                 alt="Photo">

                                        <label for="link_bg">link_bg</label>
                                        <input type="file" name="link_bg" id="link_bg">
                                        <p class="help-block">link_bg.</p>
                                    </div>
                                </div>
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

            <!-- /.box -->
        </section>
        <!-- /.content -->
        <section class="content-header">
            <div>
                <button type="button" class="btn btn-info btn-default" data-target="#modal-add-chapter"
                        data-toggle="modal">
                    <a href="#"><i
                            class="fa fa-user-plus"></i>{{trans('common.button.add_chapter')}}
                    </a>
                </button>

            </div>
            @include('Backend.pages.comics._modal_add_chapter')

        </section>

        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Chapter</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    @include('Backend.pages.comics._modal_edit_chapter')
                    @include('Backend.pages.comics._list_chapter')
                </div>

                <!-- /.row -->
            </div>
        </section>
    </div>
@endsection
@section('addtional_scripts')
    <script
        src="{!! asset('assets/admin/templates/js/bower_components/select2/dist/js/select2.full.min.js') !!}"></script>

    <script type="text/javascript">

        function cleanModel(modal){
            modal.find('input').each(function() {
                $(this).val('');
            });
        }

        $(document).ready(function () {
            // $("#modal-edit-chapter").on('hidden.bs.modal', function (e) {
            //     console.log("Modal đã bị ẩn.");
            //     cleanModel($('#form-edit-chapter'))
            //     // clear img
            //     $('#link_bg_preview').empty();
            // });

            $("#modal-add-chapter").on('hidden.bs.modal', function (e) {
                console.log("Modal đã bị ẩn.");
                cleanModel($('#form-edit-chapter'))
                // clear img
                $('#link_bg_preview').empty();
            });

            $('#form-edit-commic').submit((event) => {
                document.getElementById('preloader').setAttribute("style", "display:block");
            })
            $('#tagged').select2({
                multiple: true,
            });
            $(function () {
                let formDatetime = $('.form_datetime')
                formDatetime.datetimepicker({
                    weekStart: 1,
                    todayBtn: 1,
                    autoclose: 1,
                    todayHighlight: 1,
                    startView: 2,
                    forceParse: 0,
                    showMeridian: 1
                });
                formDatetime.datetimepicker('setDate', new Date());
                formDatetime.datetimepicker('update');
                formDatetime.val(moment(new Date()).format("YYYY-MM-DD H:mm"));
            });
        })

    </script>
    <script>

        let editChater = document.querySelectorAll('a[data-name="edit-chapter"]');
        editChater.forEach(item => {
            item.addEventListener('click', (event) => {
                event.preventDefault();
                document.getElementById('preloader').setAttribute("style", "display:block");
                const context = {
                    'X-CSRF-TOKEN': `{{ csrf_token() }}`,
                    'X-HTTP-Method-Override': 'GET'
                }

                // truyen du lieu cho form edit
                apiGet(context, `/admin/comics/${item.getAttribute('data-comic-id')}/chapters/edit/${item.getAttribute('data-chapter-id')}?XDEBUG_SESSION_START=11657`
                )
                    .then(response => {
                        document.getElementById('preloader').setAttribute("style", "display:none");
                        // Xử lý kết quả trả về
                        console.log(response.data);
                        let data = response.data.data
                        let chapter_name = document.querySelector('#form-edit-chapter input[name="chapter_name"]');
                        chapter_name.value = data.chapter_name
                        let chapter_number = document.querySelector('#form-edit-chapter input[name="chapter_number"]');
                        chapter_number.value = data.chapter_number
                        let publish_at = document.querySelector('#form-edit-chapter input[name="publish_at"]');
                        publish_at.value = data.publish_at
                        // let free_at = document.querySelector('#form-edit-chapter input[name="free_at"]');
                        // free_at.value = data.free_at
                        let comic_id = document.querySelector('#form-edit-chapter input[id="comic_id"]');
                        comic_id.value = data.comic_id
                        let chapter_id = document.querySelector('#form-edit-chapter input[id="chapter_id"]');
                        chapter_id.value = data.id
                        let prv_chapter_id = document.querySelector('#form-edit-chapter input[name="prv_chapter_id"]');
                        prv_chapter_id.value = data.prv_chapter_id ?? ''
                        let next_chapter_id = document.querySelector('#form-edit-chapter input[name="next_chapter_id"]');
                        next_chapter_id.value = data.next_chapter_id ?? ''
                        // let status = document.querySelector('#form-edit-chapter input[name="status"]');
                        // status.value = data.status
                        // Lấy tệp tin từ input type="file" và thêm vào FormData
                        let link_small_icon = document.querySelector('#form-edit-chapter img[name="link_small_icon"]');
                        link_small_icon.src = data.link_small_icon
                        let content_images_link_img = document.querySelector('#form-edit-chapter img[name="content_images-link_img"]');
                        let link_bg_preview = $(`#link_bg_preview .imgs`);
                        link_bg_preview.empty();
                        data.content_images.forEach(item => {
                            link_bg_preview.append(`<div class="img" style="position: relative;"><img id="closebtn" class="closebtn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAADfklEQVRoQ+2Zt+sVQRDHP7/SnDAU2iqYwJxzjqiVjX+btTZizjkhYi4MWIkJjJgLRfnKnBzH3e3s7nvIg7ftzc5+vzOzO+EG6PE10OP46RP43x7se6BXPLAa2As8AHYDX7oEfDiwH5gG7AEuhM7xhNAy4Bgw1JRdAzYBn0LKI7+PAE4AC23fN2AbcK5NT4jAUuB4CXyh6xawDvgQCbJJXOBPAgsqAkESbQSWm+WHNJx6A9gIfMwkMQo4Bcxt0PMV2AxcqvveRuAVMCEA7iawIcMTo4HTwOzAOS+AibEErgBLHNZVOK0H3jtkyyJjDPwsxz5d5lWxBEaaa+c5Drhrd+KtQ1YiChtZfo5D/o7pfhdLQPIiocs133HQPTvoTUB2LHAGmOnQedt0Nno39ArpjKYXou78h8AaQPenbo0z8DMc4F2h6SFQkCi/0W3nPwKU+KokBP4sMN0B3p1rvAR0prKkSCxyAHhsJF6a7HgDrwwbWm7wUhRDQPLKCUeAlSEUwBMj8dOy6VTHnquW5T87ZP+KxBLQnmGW4JSlQ0sktCaHBIGLwBZAicu9UghI+WDgsFnYfViL4GXLttFFYiqBgsQhe3VySKhEkOWjwaeGUBmsPHEQWJvIQDXQDuB74v6kO1A9a5CRUHUas5Qgd+aA74QHCsAiccAKOw8Jlei7gB8e4TaZnDtQ1huTrbVPJYLCLruf6AQBJTiFQ9FJeY3akaYol0Aq+IJkNokcAsrK6pXVueWs69bZJfXYqQQ6Bb4gnkwihYBKCRV1ix1mV8up5WmKVMSpx3bXQSnPqCx/FFjhAK9OSi/Nr4aJQ52KaBIxHoipRAvwRSelZ1ZZ19PZRZHwEogBr/5Ylq/2sF0h4SGgekdh4+kBmsAX4RJDwtUbhAgIvBqY2pFGJYhD4AvxmGlHkEQbgRjwmkioma8dfdTc1o6RaCOgWl/D1dDyWr6qxzuV0z41T9vrgLQReAZMCqCPtXwdCc2IQtO5501Y2ggo7hX/CqW6JfB6bbzTuCZbyBNtJDSh3gqcj/WA5Kv/Bgod9y3mc8GXL7ZGjdUJtTo1hbHmSbUr9AppU3XMrsGVvPM6dDkiv+til0kIvOJe3mlcHgLarFDZBzw1d4bmn5HY/4lrYq3HY4r9ymoFr11eAoXs71Rk3doXQ6BbGLL09glkma8Dm/se6IARs1T8ATKZsTF8DxyjAAAAAElFTkSuQmCC"> <img data-link-img="${item.id}" src="${item.link_img}" name="content_images-link_img" class="small-comic-img img-responsive" alt="link_img"></div>`);
                        })
                        let closebtn = document.querySelectorAll('img[class="closebtn"]');
                        closebtn.forEach(item => {
                            item.addEventListener('click', (event) => {
                                let parentElement = item.parentNode; // Lấy phần tử cha
                                parentElement.remove(); // Xóa phần tử cha
                            })
                        })

                        $('#modal-edit-chapter').modal('show')
                    })
                    .catch(error => {
                        document.getElementById('preloader').setAttribute("style", "display:none");
                        // Xử lý lỗi nếu có
                        console.error('Error:', error);
                    });

            })
        })

    </script>
    <script>
        const submitModalEditChapter = document.getElementById('submit-modal-edit-chapter')
        submitModalEditChapter.addEventListener('click', (event) => {
            event.preventDefault();
            let formData = new FormData(); // Tạo đối tượng FormData để chứa dữ liệu form
            let chapter_name = document.querySelector('#form-edit-chapter input[name="chapter_name"]');
            let chapter_number = document.querySelector('#form-edit-chapter input[name="chapter_number"]');
            let publish_at = document.querySelector('#form-edit-chapter input[name="publish_at"]');
            // let free_at = document.querySelector('#form-edit-chapter input[name="free_at"]');
            let comic_id = document.querySelector('#form-edit-chapter input[id="comic_id"]');
            let comic_code = document.querySelector('#form-edit-chapter input[id="comic_code"]');
            let chapter_id = document.querySelector('#form-edit-chapter input[id="chapter_id"]');
            // let status = document.querySelector('#form-edit-chapter input[name="status"]');
            // Lấy tệp tin từ input type="file" và thêm vào FormData
            let link_small_icon = document.querySelector('#form-edit-chapter input[name="link_small_icon"]');
            let content_images_link_img = document.querySelector('#form-edit-chapter input[name="content_images-link_img[]"]');
            let content_images_id = document.querySelectorAll('#link_bg_preview .imgs img[alt="link_img"]');
            // let link_bg_preview = $(`#link_bg_preview .imgs img[alt="link_img"]`);
            if(content_images_id){
                content_images_id.forEach(function(input) {
                    formData.append('content_images_id[]',input.getAttribute('data-link-img'));
                });
            }

            formData.append('link_small_icon', link_small_icon.files[0]);
             for (let i = 0; i < content_images_link_img.files.length; i++) {
                formData.append('link_img[]', content_images_link_img.files[i]);
            }

            formData.append('chapter_name', chapter_name.value);
            formData.append('chapter_number', chapter_number.value);
            // formData.append('status', status.value);
            formData.append('comic_id', comic_id.value);
            formData.append('id', chapter_id.value);
            // formData.append('free_at', free_at.value);
            formData.append('publish_at', publish_at.value);
            formData.append('_method', 'patch');

            document.getElementById('preloader').setAttribute("style", "display:block");
            const context = {
                'X-CSRF-TOKEN': `{{ csrf_token() }}`,
                'X-HTTP-Method-Override': 'PATCH'
            }
            apiPost(context, `/admin/comics/${comic_code.value}/chapters/${chapter_id.value}?XDEBUG_SESSION_START=14087`,
                formData)
                .then(response => {
                    $('#modal-edit-chapter').modal('hide')
                    document.getElementById('preloader').setAttribute("style", "display:none");
                    // Xử lý kết quả trả về
                    let data = response.data.data
                    if (response.data.code !== 200) {
                        showToast(response.data.message, "danger", 5000);
                    } else {
                        // clear form
                        cleanModel($('#form-edit-chapter'))
                        // clear img
                        $('#link_bg_preview').empty();
                        showToast(response.data.message, "success", 5000);
                        document.location = data.redirect;
                    }

                    event.preventDefault();
                })
                .catch(error => {
                    document.getElementById('preloader').setAttribute("style", "display:none");
                    // Xử lý lỗi nếu có
                    showToast(error.response.data.message, "danger", 5000);
                    // $('#modal-edit-chapter').modal('hide')
                    event.preventDefault();
                });

        })
    </script>
    <script>
        const submitModalAddChapter = document.getElementById('submit-modal-add-chapter')
        submitModalAddChapter.addEventListener('click', (event) => {
            event.preventDefault();
            let formData = new FormData(); // Tạo đối tượng FormData để chứa dữ liệu form
            let chapter_name = document.querySelector('#form-add-chapter input[name="chapter_name"]');
            let chapter_number = document.querySelector('#form-add-chapter input[name="chapter_number"]');
            let publish_at = document.querySelector('#form-add-chapter input[name="publish_at"]');
            // let free_at = document.querySelector('#form-add-chapter input[name="free_at"]');
            let comic_id = document.querySelector('#form-add-chapter input[id="comic_id"]');
            let comic_code = document.querySelector('#form-add-chapter input[id="comic_code"]');
            // let status = document.querySelector('#form-add-chapter input[name="status"]');
            // Lấy tệp tin từ input type="file" và thêm vào FormData
            let link_small_icon = document.querySelector('#form-add-chapter input[name="link_small_icon"]');
            let content_images_link_img = document.querySelector('#form-add-chapter input[name="content_images-link_img[]"]');
            formData.append('link_small_icon', link_small_icon.files[0]);

            for (let i = 0; i < content_images_link_img.files.length; i++) {
                formData.append('link_img[]', content_images_link_img.files[i]);
            }

            formData.append('publish_at', publish_at.value);
            formData.append('chapter_name', chapter_name.value);
            formData.append('chapter_number', chapter_number.value);
            // formData.append('status', status.value);
            formData.append('comic_id', comic_id.value);
            document.getElementById('preloader').setAttribute("style", "display:block");
            const context = {
                'X-CSRF-TOKEN': `{{ csrf_token() }}`,
                'X-HTTP-Method-Override': 'POST'
            }
            apiPost(context, `/admin/comics/${comic_code.value}/chapters/?XDEBUG_SESSION_START=13864`,
                formData)
                .then(response => {
                    $('#modal-add-chapter').modal('hide')
                    document.getElementById('preloader').setAttribute("style", "display:none");
                    // Xử lý kết quả trả về
                    let data = response.data.data
                    if (response.data.code !== 200) {
                        showToast(response.data.message, "danger", 5000);
                    } else {
                        // clear form
                        cleanModel($('#form-edit-chapter'))
                        // clear img
                        $('#link_bg_preview').empty();
                        showToast(response.data.message, "success", 5000);
                        document.location = data.redirect;
                    }
                })
                .catch(error => {
                    $('#modal-add-chapter').modal('hide')
                    document.getElementById('preloader').setAttribute("style", "display:none");
                    // Xử lý lỗi nếu có
                    showToast(error.response.data.message, "danger", 5000);

                });

        })
    </script>
    <script>
        let deleteChapter = document.querySelectorAll('a[data-name="delete-chapter"]')
        deleteChapter.forEach(item => {
            item.addEventListener('click', (event) => {
                event.preventDefault();
                const context = {
                    'X-CSRF-TOKEN': `{{ csrf_token() }}`,
                    'X-HTTP-Method-Override': 'DELETE'
                }
                let comic_code = item.getAttribute('data-comic-id');
                document.getElementById('preloader').setAttribute("style", "display:block");
                apiDelete(context, `/admin/comics/${comic_code}/chapters/${item.getAttribute('data-chapter-id')}?XDEBUG_SESSION_START=10538`)
                    .then(response => {
                        document.getElementById('preloader').setAttribute("style", "display:none");
                        // Xử lý kết quả trả về
                        let data = response.data.data
                        if (response.data.code !== 200) {
                            showToast(response.data.message, "danger", 5000);
                        } else {
                            showToast(response.data.message, "success", 5000);
                            document.location = data.redirect;
                        }
                    })
                    .catch(error => {
                        $('#modal-edit-chapter').modal('hide')
                        // Xử lý lỗi nếu có
                        document.getElementById('preloader').setAttribute("style", "display:none");
                        showToast(error, "danger", 5000);
                    });

            })
        })

    </script>
@endsection

