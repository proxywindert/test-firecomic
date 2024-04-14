@extends("Frontend.layouts.master")
@section("header")
    <header class="header" style="margin-bottom: 56px">
        <div class="fake-block-search">
        </div>
        <div id="block-search" class="block-search">
            <div class="col-right">
                <a class="back-button" href="#">
                    <img
                        src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAzMiAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik00LjQxNzUzIDEwLjU4NThMNy45NDU2NiA3LjA1NzY4TDcuOTUzMDUgNy4wNTAyMkM4LjM0MzU3IDYuNjU5NjkgOC45NzY3NCA2LjY1OTY5IDkuMzY3MjYgNy4wNTAyMkM5Ljc1Nzc3IDcuNDQwNzMgOS43NTc3OSA4LjA3Mzg3IDkuMzY3MyA4LjQ2NDM5TDkuMzY3MzQgOC40NjQ0M0w2LjgzMTggMTFIMjguMDAwMkMyOC41NTI1IDExIDI5LjAwMDIgMTEuNDQ3NyAyOS4wMDAyIDEyQzI5LjAwMDIgMTIuNTUyMyAyOC41NTI1IDEzIDI4LjAwMDIgMTNINi44MzE2OUw5LjM2MTQ5IDE1LjUyOThMOS4zNjcyNiAxNS41MzU1QzkuNzU3NzkgMTUuOTI2IDkuNzU3NzkgMTYuNTU5MiA5LjM2NzI2IDE2Ljk0OTdDOC45NzY3NCAxNy4zNDAyIDguMzQzNTcgMTcuMzQwMiA3Ljk1MzA1IDE2Ljk0OTdMNy45NTMwNCAxNi45NDk3TDcuOTUzMDEgMTYuOTQ5N0w0LjAwMzI2IDEzSDQuMDAwMlYxMi45OTY5TDMuNzEwMzcgMTIuNzA3MUMzLjMxOTg1IDEyLjMxNjYgMy4zMTk4NSAxMS42ODM0IDMuNzEwMzcgMTEuMjkyOUw0LjAwMDIgMTEuMDAzVjExSDQuMDAzMjdMNC40MTc0OCAxMC41ODU4TDQuNDE3NTMgMTAuNTg1OFoiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo="
                        alt="back" width="32px" height="24px">
                </a>
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
                               <img
                                   src="{!! $comic->link_bg?getLinkSpinImg():'' !!}"
                                   class="lazyload bg-img" data-src="{!! asset($comic->link_bg) !!}"
                                    alt="">
                           </picture>
                           <picture>
                               <img class="lazyload char-img"
                                    src="{!! $comic->link_banner?getLinkSpinImg():'' !!}"
                                    data-src="{!! asset($comic->link_banner) !!}" alt="">
                           </picture>
                           <div class="label-time-content">
                               <div class="time">
                                   <img
                                       class="lazyload"
                                       src="{!! getLinkSpinImg() !!}"
                                       data-src="{!! asset("assets/images/time-border.svg") !!}" alt="">
                                   <span class=" content-overflow">{{ $comic?->diff_time }}</span>
                               </div>
                               <div class="comic-name">
                                   <img
                                       class="lazyload"
                                       src="{!! $comic->link_comic_name?getLinkSpinImg():'' !!}"
                                       data-src="{!! asset($comic->link_comic_name) !!}" alt="">
                               </div>
                           </div>
                           <div class="chapter">
                               <span class=" content-overflow">{{ $comic?->chapters?->last()?->chapter_name??'' }}</span>
                           </div>
                       </a>
                   </div>
               @endforeach
            </div>

        </div>
    </div>
@endsection
@section("addtional_scripts")
    <script >
        document.addEventListener("DOMContentLoaded", function () {
            new IOlazy({
                image: 'img',
                threshold: 0.1,
            });
        });
    </script>
    <script>
        window.addEventListener('load',()=>{
            document.querySelector('.back-button').addEventListener('click',()=>{
                window.location = '/'
            })
        })
    </script>
@endsection
