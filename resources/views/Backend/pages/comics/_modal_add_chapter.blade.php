<div class="modal fade" id="modal-add-chapter" style="display: none;">
    <div class="modal-lg modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Thêm Chapter</h4>
            </div>
            <div class="modal-body">
                <div id="msg">
                    {{ session()->get('msg') }}
                </div>
                <form id="form-add-chapter" role="form" method="POST"
                      action="{{ route('comics.chapters.store',['comic_code'=>$comic->comic_code]) }}?XDEBUG_SESSION_START=19407"
                      enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input type="hidden" id="comic_code" value="{{ $comic->comic_code }}"/>
                    <input type="hidden" id="comic_id" value="{{ $comic->id }}"/>
                    <div class="box-body">
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label >{{trans('chapter.chapter_name')}}</label>
                                    <input
                                        type="text" class="form-control"  name="chapter_name"
                                        placeholder="chapter_name">
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label >{{trans('chapter.chapter_number')}}</label>
                                    <input
                                        type="number" class="form-control"  name="chapter_number"
                                        placeholder="chapter_number">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-md-6">

                                <div class="form-group">
                                    <label>{{trans('chapter.publish_at')}}</label>
                                    <div class='input-group date form_datetime'>
                                        <input name="publish_at" type='text' value="" class="form-control" placeholder="yyyy-MM-dd HH:mm"/>
                                        <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                    </div>

                                </div>
                            </div>
{{--                            <div class="col col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>free_at</label>--}}
{{--                                    <div class='input-group date form_datetime'>--}}
{{--                                        <input name="free_at" type='text' value="" class="form-control" placeholder="yyyy-MM-dd HH:mm"/>--}}
{{--                                        <span class="input-group-addon">--}}
{{--                                                    <span class="glyphicon glyphicon-calendar"></span>--}}
{{--                                                </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </div>

                        <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label >{{trans('chapter.status')}}</label>
                                    <input
                                        type="text" class="form-control" name="status"
                                        placeholder="status">
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <img class="small-comic-img img-responsive"
                                         src="{!! asset(old('link_small_icon', isset($comic["link_small_icon"]) ? $comic["link_small_icon"] : null)) !!}"
                                         alt="Photo">
                                    <label >{{trans('chapter.link_small_icon')}}</label>
                                    <input type="file" name="link_small_icon" >
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
{{--                                    <img class="small-comic-img img-responsive"--}}
{{--                                         src="{!! asset(old('content_images', isset($comic["content_images"]) ? $comic["content_images"] : null)) !!}"--}}
{{--                                         alt="Photo">--}}
                                    <label >{{trans('chapter.content_images_link_img')}}-link_img</label>
                                    <input multiple type="file" name="content_images-link_img[]" >
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="box-footer">
                        <button data-comic-id="{{$comic->comic_code}}" id="submit-modal-add-chapter" type="submit"
                                class="btn btn-primary">Thêm
                        </button>
                    </div>
                </form>
            </div>

        </div>

    </div>

</div>

