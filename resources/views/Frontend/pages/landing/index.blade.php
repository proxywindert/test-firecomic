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
                    <div data-comic-id="{{ $comic->comic_code }}" class="skeleton-loader card">
                        <div class="skeleton-bg-content"
                             style="background:{{ $comic->skeleton_bg_color }}"></div>
                        <div class="skeleton-tranfer-bg" style="{{ $comic->tranfer_color }}">
                        </div>
                        <a href="{!! route('comic-info', [$comic->slug, $comic->comic_code]) !!}">
                            <picture>
                                <img class="lazyload bg-img"
									referrerpolicy="no-referrer"
                                     data-src="{!! asset($comic->link_bg) !!}" alt="">
                                {{--                                <img class="lazyload" data-src="{!! asset($comic->link_bg) !!}"--}}
                                {{--                                     alt="">--}}
                            </picture>
                            <picture>
                                <img class="lazyload char-img"
									referrerpolicy="no-referrer"
                                     data-src="{!! asset($comic->link_banner) !!}" alt="">
                            </picture>
                            <div class="label-time-content">
                                <div class="time">
                                    <img class="lazyload"
										referrerpolicy="no-referrer"
                                         data-src="{!! asset("assets/images/time-border.svg") !!}" alt="">
                                    <span style="display: none" class="content-overflow">{{ $comic?->diff_time }}</span>
                                </div>
                                <div class="comic-name">
                                    <img class="lazyload"
										referrerpolicy="no-referrer"
                                         data-src="{!! asset($comic->link_comic_name) !!}" alt="">
                                </div>
                            </div>
                            <div class="chapter">
                                <span style="display: none"
                                      class=" content-overflow">{{ $comic?->chapters?->last()?->chapter_name??'' }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
            <div class="row">
                @if($comics->hasPages())
                    <div class="col-sm-12 pagination-outter">
                        {{  $comics->appends($param)->render('Frontend.components.pagination.custom') }}
                    </div>
                @endif
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
                        <p class="name">© Khotruyenfull</p>
                    </a>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('addtional_scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let lazyImageObserver;
            lazyImageObserver = new IntersectionObserver(function (entries, observer) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        try {

                            let lazyImage = entry.target;
                            let span = lazyImage.querySelectorAll('span')
                            let lazyImages = lazyImage.querySelectorAll('img[class^=lazyload]')
                            let loadedImages = 0;
                            lazyImages.forEach(item => {
                                item.src = item.dataset.src;
                                item.removeAttribute('data-src');
                                item.addEventListener('load', (inner) => {
                                    loadedImages++;
                                    if (loadedImages === lazyImages.length) {
                                        let bg_content = lazyImage.querySelector('div[class="skeleton-bg-content"]')
                                        let tranfer_anchor = lazyImage.querySelector('div[class="skeleton-tranfer-bg"]')
                                        lazyImage.removeChild(bg_content)
                                        lazyImage.removeChild(tranfer_anchor)

                                        lazyImage.classList.remove("skeleton-loader");
                                        span.forEach(item => {
                                            item.style.setProperty("display", "block");
                                        })
                                    }
                                });
                            })
                            lazyImageObserver.unobserve(lazyImage);
                        } catch (e) {

                        }

                    }
                });
            }, {
                root: null, // Quan sát theo viewport
                rootMargin: '0px', // Không có margin xung quanh phần tử gốc
                threshold: 0.1 // Kích hoạt sự kiện khi phần tử hiển thị ít nhất 10% trong vùng nhìn thấy
            });

            let imgs = document.querySelectorAll('div[class^=skeleton-loader]')
            imgs.forEach((item) => {
                lazyImageObserver.observe(item);
            })
        });
    </script>
@endsection
