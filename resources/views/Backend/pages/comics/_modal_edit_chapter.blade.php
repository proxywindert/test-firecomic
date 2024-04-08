<div class="modal fade" id="modal-edit-chapter" style="display: none;">
    <div class="modal-lg modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Sửa Chapter</h4>
            </div>
            <div class="modal-body">
                <div id="msg">
                    {{ session()->get('msg') }}
                </div>
                <form id="form-edit-chapter" role="form" method="POST"
                      action="{{ route('comics.chapters.store',['comic_code'=>$comic->comic_code]) }}?XDEBUG_SESSION_START=19407"
                      enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input type="hidden" id="comic_code" value="{{ $comic->comic_code }}"/>
                    <input type="hidden" id="comic_id" value="{{ $comic->id }}"/>
                    <input type="hidden" id="chapter_id" value=""/>
                    <div class="box-body">
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label>chapter_name</label>
                                    <input
                                        type="text" class="form-control" name="chapter_name"
                                        placeholder="chapter_name">
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label>chapter_number</label>
                                    <input
                                        type="number" class="form-control" name="chapter_number"
                                        placeholder="chapter_number">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-md-6">

                                <div class="form-group">
                                    <label>publish_at</label>
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
                                    <label>status</label>
                                    <input
                                        type="text" class="form-control" name="status"
                                        placeholder="status">
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <img name="link_small_icon" class="small-comic-img img-responsive"
                                         src="{!! asset(old('link_small_icon', isset($comic["link_small_icon"]) ? $comic["link_small_icon"] : null)) !!}"
                                         alt="Photo">
                                    <label>link_small_icon</label>
                                    <input type="file" name="link_small_icon">
                                    <p class="help-block">link_small_icon.</p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label>prv_chapter_id</label>
                                    <input
                                        type="number" class="form-control" name="prv_chapter_id"
                                        placeholder="prv_chapter_id">
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label>next_chapter_id</label>
                                    <input
                                        type="number" class="form-control" name="next_chapter_id"
                                        placeholder="next_chapter_id">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <img name="content_images-link_img" class="small-comic-img img-responsive"
                                         src="{!! asset(old('content_images', isset($comic["content_images"]) ? $comic["content_images"] : null)) !!}"
                                         alt="Photo">
                                    <label>content_images-link_img</label>
                                    <input type="file" name="content_images-link_img">
                                    <p class="help-block">content_images-link_img.</p>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="box-footer">
                        <button data-comic-id="{{$comic->comic_code}}" id="submit-modal-edit-chapter" type="submit"
                                class="btn btn-primary">Sửa
                        </button>
                    </div>
                </form>
            </div>

        </div>

    </div>

</div>

