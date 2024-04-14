@extends("Frontend.layouts.master")
@section("header")
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="banner">
                    <a href="">
                        <img src="{!! asset("assets/images/logo.png") !!}" alt="">
                    </a>

                </div>
                <div class="nav-bar-anchor"
                     style="top: 44px;background-color: rgba(var(--background), var(--tw-bg-opacity));">
                    <div class="nav-bar">
                        <ul class="list-item">
                            @foreach($genres as $genre)
                                <li class="item">
                                    <a class="{{ $loop->index == 0?"active":"" }}" href="">{{$genre->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>


            </div>
        </div>

        <div id="block-search" class="block-search">
            <div class="col-right">

            </div>
            <div class="col-left">

                <a href="" class="search-btn">
                    <img src="{!! asset("assets/images/search.svg") !!}" alt="">
                </a>
                <div id="open-tab-nav-header" class="menu-btn">
                    <img src="{!! asset("assets/images/menu.svg") !!}" alt="">
                </div>
            </div>

        </div>
        @include('Frontend.components.right-bar.right-bar')

    </header>
@endsection
@section("main-content")
    <div class="main">
        <div class="container">
            <div class="cards">
                @foreach($comics as $comic)
                    <div class="card">
                        <a href="{{ route('comic-info', ['comic_code' => $comic->comic_code]) }}">
                            <picture>
                                <img class="lazyload bg-img"
                                     src="{!! $comic->link_bg?getLinkSpinImg():'' !!}"
                                     data-src="{!! asset($comic->link_bg) !!}" alt="">
{{--                                <img class="lazyload" data-src="{!! asset($comic->link_bg) !!}"--}}
{{--                                     alt="">--}}
                            </picture>
                            <picture>
                                <img class="lazyload char-img"
                                     src="{!! $comic->link_banner?getLinkSpinImg():'' !!}"
                                     data-src="{!! asset($comic->link_banner) !!}" alt="">
                            </picture>
                            <div class="label-time-content">
                                <div class="time">
                                    <img class="lazyload"
                                         src="{!! getLinkSpinImg() !!}"
                                         data-src="{!! asset("assets/images/time-border.svg") !!}" alt="">
                                    <span class=" content-overflow">{{ $comic?->diff_time }}</span>
                                </div>
                                <div class="comic-name">
                                    <img class="lazyload"
                                         src="{!! $comic->link_comic_name?getLinkSpinImg():'' !!}"
                                         data-src="{!! asset($comic->link_comic_name) !!}" alt="">
                                </div>
                            </div>
                            <div class="chapter">
                                <span
                                    class=" content-overflow">{{ $comic?->chapters?->last()?->chapter_name??'' }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
@endsection
@section("footer")
    <div class="footer">
        <div class="container-fluid">
            <div class="container">
                <div class="copyright">
                    <a href="#">
                        <p class="name">© FIRE COMIC</p>
                    </a>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('addtional_scripts')

    <script >
        document.addEventListener("DOMContentLoaded", function () {
            new IOlazy({
                image: 'img',
                threshold: 0.1,
            });
        });
    </script>
@endsection
