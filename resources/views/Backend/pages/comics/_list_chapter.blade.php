<table id="chapter-list" class="table table-bordered table-striped table-fit">
    <thead>
    <tr>
        <th>{{trans('chapter.id')}}</th>
        <th>{{trans('chapter.chapter_name')}}</th>
        <th>{{trans('chapter.link_small_icon')}}</th>
        <th>{{trans('common.edit')}}</th>
    </tr>
    </thead>
    <tbody class="context-menu">
    @foreach($chapters as $chapter)
        <tr class="comic-menu" id="chapter-id-{{$chapter->id}}"
            data-chapter-id="{{$chapter->id}}">
            <td class="comic-name">
                <span>{{$chapter->id}}</span>
            </td>
            <td class="comic-name">
                <span>{{$chapter->chapter_name}}</span>
            </td>
            <td>
                <img
                    class="lazyload small-comic-img img-fluid"
                    src="{!! asset('assets/images/loadspinner.svg') !!}"
                    data-src="{{asset($chapter->link_small_icon)}}"
                     alt="Photo">
            </td>
            <td class="project-actions text-right">
{{--                <a class="btn btn-primary btn-sm" href="#">--}}
{{--                    <i class="fas fa-folder">--}}
{{--                    </i>--}}
{{--                    View--}}
{{--                </a>--}}
{{--                // hien modal ,de sua chapter--}}
                <a data-chapter-id="{{$chapter->id}}" data-comic-id="{{$comic->comic_code}}" data-name="edit-chapter" id="edit-chapter" class="btn btn-info btn-sm" href="#">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                </a>
{{--                xoa chapter dung ajax--}}
                <a data-name="delete-chapter" id="delete-chapter" data-chapter-id="{{$chapter->id}}" data-comic-id="{{$comic->comic_code}}" class="btn btn-danger btn-sm"
                   href="#"
                >
                    <i class="fas fa-trash">
                    </i>
                    Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row">
    @if($chapters->hasPages())
        <div class="col-sm-5">
            <div class="dataTables_info" style="float:left" id="example2_info" role="status" aria-live="polite">
                {{getInformationDataTable($chapters)}}
            </div>
        </div>
        <div class="col-sm-7">
            {{  $chapters->appends($param)->render('Backend.components.pagination.custom') }}
        </div>
    @endif
</div>


