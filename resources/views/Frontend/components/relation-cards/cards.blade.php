@foreach($relations as $relation)
    <a href="{{ route('comic-info',['comic_code'=>$relation->comic_code]) }}" class="comic">
        <picture class="bg-content-comic">
            <img
                class="lazyload"
                src="{!! $relation->link_bg?getLinkSpinImg():'' !!}"
                data-src="{!! $relation->link_bg !!}"
                alt="">
        </picture>
        <picture class="comic-avatar">
            <img
                class="lazyload"
                src="{!! $relation->link_avatar?getLinkSpinImg():'' !!}"
                data-src="{!! $relation->link_avatar !!}"
                alt="">
        </picture>
        <div class="tranfer-comic"
             style="{{ $relation->tranfer_color }}">
        </div>
        <div class="comic-name">
            <img
                class="lazyload"
                src="{!! $relation->link_comic_small_name?getLinkSpinImg():'' !!}"
                data-src="{!! $relation->link_comic_small_name !!}"
                alt="">
        </div>
{{--        <div class="extend-info">--}}
{{--            <span class="label-free-span bg-color-yellow"> miễn phí</span>--}}
{{--        </div>--}}
    </a>
@endforeach
