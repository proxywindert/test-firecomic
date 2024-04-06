@extends("Frontend.layouts.master")
@section("header")
    <header class="header">
        <div class="fake-block-search" style="background-color: {{ $comic->bg_color }}">
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
        <div class="tab-nav-header" id="tab-nav-header">
            <button id="close-tab-nav-header" class="close-tab-nav-header">
                <img src="{!! asset("assets/images/close.svg") !!}" alt="close">
            </button>
            <ul>
                <li class="nav-item">
                    <a href="" class="s13-bold-white">Liên hệ</a>
                    <ul class="sub-contact">
                        <li>
                            <a target="_blank" href="https://m.me/AlexVrt1">
                                <img src="{!! asset("assets/images/messenger.webp") !!}" alt="">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="mailto:firecomic247@gmail.com">
                                <img src="{!! asset("assets/images/email.webp") !!}" alt="">
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>

@endsection
@section("main-content")
    <div class="main">
        <div class="container">
            <div>
                <picture class="bg-content-home">
                    <img src="{!! asset($comic->link_bg) !!}" alt="">
                </picture>
            </div>

            <div class="wrapper-banner">
                <div class="banner-char">
                    <div class="img-char" style="border-color:{{$comic->bg_color}}">
                        <img src="{!! asset($comic->link_banner) !!}" alt="">

                    </div>
                </div>
            </div>

            <div class="label-time-content">
                <div class="time">
                    <img src="{!! asset("assets/images/time-border.svg") !!}" alt="">
                    <span>3 tuần trước</span>
                </div>
            </div>
            <div class="comic-info">
                <h3 class="comic-title">
                    {{ $comic->comic_name ?? '' }}
                </h3>
{{--                <span class="comic-des">--}}
{{--                        Cỏ sông--}}
{{--                    </span>--}}
                <div class="rate">
                    <div class="type">
                        <div class="icon">
                            <img
                                src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTQiIHZpZXdCb3g9IjAgMCAxNiAxNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3QgeD0iMyIgeT0iMy41IiB3aWR0aD0iMTEiIGhlaWdodD0iMSIgcng9IjAuNSIgZmlsbD0id2hpdGUiLz4KPHJlY3QgeD0iMyIgeT0iNi41IiB3aWR0aD0iOCIgaGVpZ2h0PSIxIiByeD0iMC41IiBmaWxsPSJ3aGl0ZSIvPgo8cmVjdCB4PSIzIiB5PSI5LjUiIHdpZHRoPSI1IiBoZWlnaHQ9IjEiIHJ4PSIwLjUiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo="
                                alt="" width="16" height="14" class="opacity-40">
                        </div>
                        <span class="type-name">
                            {{ $comic?->hashtags?->isEmpty()?'': $comic->hashtags->first()->name}}
                            </span>
                    </div>
                    <div class="view">
                        <div class="icon">
                            <img
                                src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTQiIHZpZXdCb3g9IjAgMCAxNiAxNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTIuNSA1LjMwMjg3QzMuNDQwODIgMy45OTUyOSA1IDIuNDEwMTYgNy45OTIwNiAyLjQxMDE2QzEwLjk0MjMgMi40MTAxNiAxMi41NTkxIDMuOTk1MjYgMTMuNSA1LjMwMjg3IiBzdHJva2U9IndoaXRlIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPHBhdGggZD0iTTIuNSA4LjY5NzEzQzMuNDQwODIgMTAuMDA0NyA1IDExLjU4OTggNy45OTIwNiAxMS41ODk4QzEwLjk0MjMgMTEuNTg5OCAxMi41NTkxIDEwLjAwNDcgMTMuNSA4LjY5NzEzIiBzdHJva2U9IndoaXRlIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPGNpcmNsZSBjeD0iOCIgY3k9IjciIHI9IjIiIHN0cm9rZT0id2hpdGUiLz4KPC9zdmc+Cg=="
                                alt="" width="16" height="14" class="opacity-40">
                        </div>
                        <span class="type-name">
                            {{ number_format($comic->total_view, 0, ".", ".") }}
                            </span>
                    </div>
                    <div class="like">
                        <div class="icon">
                            <img
                                src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTQiIHZpZXdCb3g9IjAgMCAxNiAxNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTUuNDE2NjcgMTIuMTY2N1Y2LjE2NjY4TTIuNSA3LjMzMzM0VjExQzIuNSAxMS42NDQzIDMuMDIyMzMgMTIuMTY2NyAzLjY2NjY3IDEyLjE2NjdIMTEuMDUzNkMxMS45MTczIDEyLjE2NjcgMTIuNjUxOSAxMS41MzY1IDEyLjc4MzIgMTAuNjgyOEwxMy40MTE0IDcuNTk5NDNDMTMuNTc0NSA2LjUzOTM2IDEyLjc1NDMgNS41ODMzMyAxMS42ODE4IDUuNTgzMzNIOS45MzE3MkM5LjYwOTU1IDUuNTgzMzMgOS4zNDgzOCA1LjMyMjE3IDkuMzQ4MzggNVYyLjkzODQxQzkuMzQ4MzggMi4xNDQgOC43MDQzOSAxLjUgOC4wNjE1OSAxLjVDNy44NzIxMSAxLjUgNy43MDA0IDEuNjExNTkgNy42MjM0NSAxLjc4NDc0TDUuNTcwNjMgNS44MjAyNkM1LjQ3NyA2LjAzMDkyIDUuMjY4MSA2LjE2NjY4IDUuMDM3NTcgNi4xNjY2OEgzLjY2NjY3QzMuMDIyMzMgNi4xNjY2OCAyLjUgNi42ODkwMSAyLjUgNy4zMzMzNFoiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8L3N2Zz4K"
                                alt="" width="16" height="14" class="opacity-40">
                        </div>
                        <span class="type-name">
                                {{ number_format($comic->total_like, 0, ".", ".") }}
                            </span>
                    </div>
                </div>

            </div>
            <div class="tranfer-anchor">
                <div class="tranfer-bg" style="{{ $comic->tranfer_color }}">
                </div>
            </div>
            <div class="wrapper-content">
                <div class="bg-content" style="background:{{ $comic->bg_color }}"></div>
                <div class="nav-bar-anchor" style="background:{{ $comic->bg_color }}">
                    <div class="nav-bar">

                        <div class="wrapper-list">
                            <ul class="list-item">
                                <li class="item active"><a onclick="changeTab(event, 'content-tab')">
                                        Nội dung
                                    </a>
                                </li>
                                <li class="item"><a onclick="changeTab(event, 'info-tab')">
                                        Thông tin
                                    </a>
                                </li>
                                {{--                                <li class="item"><a href="">--}}
                                {{--                                        Bình luận--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="content-tab" class="content-anchor">
                    <input type="hidden" name="comic_code" value="{{$comic->comic_code}}"/>
                    <a href="{{ route('view-comic', ['comic_code' => $comic->comic_code,'chapter_number' => '1']) }}"
                       class="chapter">
                        <div class="watch-first-chap">
                                <span>
                                    Xem tập đầu tiên
                                </span>
                        </div>
                    </a>
                    <div class="list-chapter">
                        @foreach($comic->chapters as $key => $chapter)
                            @if($key>0)
                                <a href="{{ route('view-comic', ['comic_code' => $comic->comic_code,'chapter_number' => $chapter->chapter_number]) }}"
                                   class="chapter">
                                    <div class="icon-img">
                                        <img src="{!! asset($chapter->link_small_icon) !!}" alt="">
                                    </div>
                                    <div class="des">
                                        <p class="title">
                                            tập {{ $chapter->chapter_number }}
                                        </p>
                                        <p class="date">
                                            01/07/09
                                        </p>
                                    </div>
                                    <div class="extend-info">
                                        <span class="label-free-span bg-color-yellow"> miễn phí</span>
                                    </div>

                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div id="info-tab" class="content-anchor">
                    <div class="cards">
                        {{--                        <div class="card">--}}
                        {{--                            <div class="header">--}}
                        {{--                                <div class="content-header">--}}
                        {{--                                    <span class="label-free-span bg-color-white">miễn phí 2 ngày 1 lần</span>--}}
                        {{--                                    <span class="label-span bg-color-success">miễn phí 2 ngày 1 lần</span>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="content">--}}
                        {{--                                <div class="content-body">--}}
                        {{--                                    <div class="list-content">--}}
                        {{--                                        <div class="row-content">--}}
                        {{--                                            <div class="col-tittle">--}}
                        {{--                                                <span class="content-overflow">Nhà xuất bản</span>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="col-des ">--}}
                        {{--                                                <span class="content-overflow">카카오웹툰 스튜디오</span>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="row-content">--}}
                        {{--                                            <div class="col-tittle">--}}
                        {{--                                                <span class="content-overflow">Họa sĩ</span>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="col-des content-overflow">--}}
                        {{--                                                <span class="content-overflow">GAR2</span>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="row-content">--}}
                        {{--                                            <div class="col-tittle">--}}
                        {{--                                                <span class="content-overflow">Nhóm tác giả</span>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="col-des content-overflow">--}}
                        {{--                                                <span class="content-overflow">GAR2</span>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}

                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <div class="card">
                            <div class="header">
                                <div class="content-header">
                                    <h3 class="">Tóm tắt nội dung</h3>
                                </div>
                            </div>
                            <div class="content">
                                <div class="content-body">
                                    <p id="content-desc" class="desc content-overflow">
                                        {{ $comic?->summaryContents?->first()?->content }}
                                       </p>
                                    <button id="btn-more" class="btn-more"><img
                                            src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTQiIGhlaWdodD0iMTIiIHZpZXdCb3g9IjAgMCAxNCAxMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTMgNEw3IDhMMTEgNCIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLXdpZHRoPSIxLjc1IiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPC9zdmc+Cg=="
                                            alt=""></button>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="header">
                                <div class="content-header">
                                    <h3 class="">Từ khóa</h3>
                                </div>
                            </div>
                            <div class="content">
                                <div class="content-body">
                                    <div class="list-tag">
{{--                                        {{ dd($comic->hashtags) }}--}}
                                        @foreach($comic->hashtags as $hashtag)
                                            <a href="{{ route('searchByhashTag',['hashtag'=>$hashtag->slug??'']) }}" class="tag">
                                                <span class="content-tag">
                                                    #{{ $hashtag->name }}
                                                </span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--                        <div class="card">--}}
                        {{--                            <div class="header">--}}
                        {{--                                <div class="content-header">--}}
                        {{--                                    <h3 class="">Cùng tác giả</h3>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="content">--}}
                        {{--                                <div class="content-body">--}}
                        {{--                                    <div class="list-comic">--}}
                        {{--                                        <div class="comic">--}}
                        {{--                                            <picture class="bg-content-comic">--}}
                        {{--                                                <img src="{!! asset("assets/images/detail1/relation/comic2/bg.jpg") !!}"--}}
                        {{--                                                     alt="">--}}
                        {{--                                            </picture>--}}
                        {{--                                            <picture class="comic-avatar">--}}
                        {{--                                                <img--}}
                        {{--                                                    src="{!! asset("assets/images/detail1/relation/comic2/avatar.png") !!}"--}}
                        {{--                                                    alt="">--}}
                        {{--                                            </picture>--}}
                        {{--                                            <div class="tranfer-comic"--}}
                        {{--                                                 style="background-image: linear-gradient(rgba(146, 114, 57, 0) 0%, rgba(146, 114, 57, 0.5) 33.04%, rgba(146, 114, 57, 0.9) 66.09%, rgb(146, 114, 57) 100%);">--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="comic-name">--}}
                        {{--                                                <img--}}
                        {{--                                                    src="{!! asset("assets/images/detail1/relation/comic2/name.png") !!}"--}}
                        {{--                                                    alt="">--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="extend-info">--}}
                        {{--                                                <span class="label-free-span bg-color-yellow"> miễn phí</span>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="comic">--}}
                        {{--                                            <picture class="bg-content-comic">--}}
                        {{--                                                <img src="{!! asset("assets/images/detail1/relation/comic1/bg.jpg") !!}"--}}
                        {{--                                                     alt="">--}}
                        {{--                                            </picture>--}}
                        {{--                                            <picture class="comic-avatar">--}}
                        {{--                                                <img--}}
                        {{--                                                    src="{!! asset("assets/images/detail1/relation/comic1/avatar.png") !!}"--}}
                        {{--                                                    alt="">--}}
                        {{--                                            </picture>--}}
                        {{--                                            <div class="tranfer-comic"--}}
                        {{--                                                 style="background-image: linear-gradient(rgba(146, 114, 57, 0) 0%, rgba(146, 114, 57, 0.5) 33.04%, rgba(146, 114, 57, 0.9) 66.09%, rgb(146, 114, 57) 100%);">--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="comic-name">--}}
                        {{--                                                <img--}}
                        {{--                                                    src="{!! asset("assets/images/detail1/relation/comic1/name.png") !!}"--}}
                        {{--                                                    alt="">--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="extend-info">--}}
                        {{--                                                <div class="label-time-des">--}}
                        {{--                                                    <div class="time">--}}
                        {{--                                                        <img src="{!! asset("assets/images/detail1/clock1.svg") !!}">--}}
                        {{--                                                        <span>3 giờ</span>--}}
                        {{--                                                    </div>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="comic">--}}
                        {{--                                            <picture class="bg-content-comic">--}}
                        {{--                                                <img src="{!! asset("assets/images/detail1/relation/comic3/bg.jpg") !!}"--}}
                        {{--                                                     alt="">--}}
                        {{--                                            </picture>--}}
                        {{--                                            <picture class="comic-avatar">--}}
                        {{--                                                <img--}}
                        {{--                                                    src="{!! asset("assets/images/detail1/relation/comic3/avatar.png") !!}"--}}
                        {{--                                                    alt="">--}}
                        {{--                                            </picture>--}}
                        {{--                                            <div class="tranfer-comic"--}}
                        {{--                                                 style="background-image: linear-gradient(rgba(147, 81, 123, 0) 0%, rgba(147, 81, 123, 0.5) 33.04%, rgba(147, 81, 123, 0.9) 66.09%, rgb(147, 81, 123) 100%);">--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="comic-name">--}}
                        {{--                                                <img--}}
                        {{--                                                    src="{!! asset("assets/images/detail1/relation/comic3/name.png") !!}"--}}
                        {{--                                                    alt="">--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="extend-info">--}}
                        {{--                                                <img class="label-time-img"--}}
                        {{--                                                     src="{!! asset("assets/images/time-border.svg") !!}"--}}
                        {{--                                                     alt="">--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="comic">--}}
                        {{--                                            <picture class="bg-content-comic">--}}
                        {{--                                                <img src="{!! asset("assets/images/detail1/relation/comic5/bg.jpg") !!}"--}}
                        {{--                                                     alt="">--}}
                        {{--                                            </picture>--}}
                        {{--                                            <picture class="comic-avatar">--}}
                        {{--                                                <img--}}
                        {{--                                                    src="{!! asset("assets/images/detail1/relation/comic5/avatar.png") !!}"--}}
                        {{--                                                    alt="">--}}
                        {{--                                            </picture>--}}
                        {{--                                            <div class="tranfer-comic"--}}
                        {{--                                                 style="background-image: linear-gradient(rgba(115, 0, 5, 0) 0%, rgba(115, 0, 5, 0.5) 33.04%, rgba(115, 0, 5, 0.9) 66.09%, rgb(115, 0, 5) 100%);">--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="comic-name">--}}
                        {{--                                                <img--}}
                        {{--                                                    src="{!! asset("assets/images/detail1/relation/comic5/name.png") !!}"--}}
                        {{--                                                    alt="">--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="extend-info">--}}
                        {{--                                                <span class="label-free-span bg-color-yellow"> miễn phí</span>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="comic">--}}
                        {{--                                            <picture class="bg-content-comic">--}}
                        {{--                                                <img src="{!! asset("assets/images/detail1/relation/comic6/bg.jpg") !!}"--}}
                        {{--                                                     alt="">--}}
                        {{--                                            </picture>--}}
                        {{--                                            <picture class="comic-avatar">--}}
                        {{--                                                <img--}}
                        {{--                                                    src="{!! asset("assets/images/detail1/relation/comic6/avatar.png") !!}"--}}
                        {{--                                                    alt="">--}}
                        {{--                                            </picture>--}}
                        {{--                                            <div class="tranfer-comic"--}}
                        {{--                                                 style="background-image: linear-gradient(rgba(135, 182, 66, 0) 0%, rgba(135, 182, 66, 0.5) 33.04%, rgba(135, 182, 66, 0.9) 66.09%, rgb(135, 182, 66) 100%);">--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="comic-name">--}}
                        {{--                                                <img--}}
                        {{--                                                    src="{!! asset("assets/images/detail1/relation/comic6/name.png") !!}"--}}
                        {{--                                                    alt="">--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="extend-info">--}}
                        {{--                                                <span class="label-free-span bg-color-yellow"> miễn phí</span>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <div class="card">
                            <div class="header">
                                <div class="content-header">
                                    <h3 class="">Cùng thể loại</h3>
                                </div>
                            </div>
                            <div class="content">
                                <div class="content-body">
                                    <div class="slider-wrapper">
                                        <button id="prev-slide" class="slide-button material-symbols-rounded">
                                            <img class="slider-left-button rotate-180" width="20" height="20"
                                                 src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMy4xNTY4IDguNTg1ODNMMTMuODYzOSA5LjI5MjkzQzE0LjI1NDQgOS42ODM0NiAxNC4yNTQ0IDEwLjMxNjYgMTMuODYzOSAxMC43MDcxTDEzLjE1NjggMTEuNDE0M0w4LjkxNDE0IDE1LjY1NjlDOC41MjM2MSAxNi4wNDc0IDcuODkwNDUgMTYuMDQ3NCA3LjQ5OTkyIDE1LjY1NjlDNy4xMDk0IDE1LjI2NjQgNy4xMDk0IDE0LjYzMzIgNy40OTk5MiAxNC4yNDI3TDExLjc0MjYgMTBMNy40OTk5MiA1Ljc1NzRDNy4xMDk0IDUuMzY2ODggNy4xMDk0IDQuNzMzNzEgNy40OTk5MiA0LjM0MzE5QzcuODkwNDUgMy45NTI2NiA4LjUyMzYxIDMuOTUyNjYgOC45MTQxNCA0LjM0MzE5TDEzLjE1NjggOC41ODU4M1oiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo="
                                                 alt="" class="rotate-180">
                                        </button>
                                        <ul class="image-list">

                                            <div class="comic">
                                                <picture class="bg-content-comic">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic1/bg.jpg") !!}"
                                                        alt="">
                                                </picture>
                                                <picture class="comic-avatar">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic1/avatar.png") !!}"
                                                        alt="">
                                                </picture>
                                                <div class="tranfer-comic"
                                                     style="background-image: linear-gradient(rgba(146, 114, 57, 0) 0%, rgba(146, 114, 57, 0.5) 33.04%, rgba(146, 114, 57, 0.9) 66.09%, rgb(146, 114, 57) 100%);">
                                                </div>
                                                <div class="comic-name">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic1/name.png") !!}"
                                                        alt="">
                                                </div>
                                                <div class="extend-info">
                                                    <span class="label-free-span bg-color-yellow"> miễn phí</span>
                                                </div>
                                            </div>
                                            <div class="comic">
                                                <picture class="bg-content-comic">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic2/bg.jpg") !!}"
                                                        alt="">
                                                </picture>
                                                <picture class="comic-avatar">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic2/avatar.png") !!}"
                                                        alt="">
                                                </picture>
                                                <div class="tranfer-comic"
                                                     style="background-image: linear-gradient(rgba(45, 102, 161, 0) 0%, rgba(45, 102, 161, 0.5) 33.04%, rgba(45, 102, 161, 0.9) 66.09%, rgb(45, 102, 161) 100%);">
                                                </div>
                                                <div class="comic-name">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic2/name.png") !!}"
                                                        alt="">
                                                </div>
                                                <div class="extend-info">
                                                    <span class="label-free-span bg-color-yellow"> miễn phí</span>
                                                </div>
                                            </div>
                                            <div class="comic">
                                                <picture class="bg-content-comic">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic3/bg.jpg") !!}"
                                                        alt="">
                                                </picture>
                                                <picture class="comic-avatar">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic3/avatar.png") !!}"
                                                        alt="">
                                                </picture>
                                                <div class="tranfer-comic"
                                                     style="background-image: linear-gradient(rgba(147, 81, 123, 0) 0%, rgba(147, 81, 123, 0.5) 33.04%, rgba(147, 81, 123, 0.9) 66.09%, rgb(147, 81, 123) 100%);">
                                                </div>
                                                <div class="comic-name">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic3/name.png") !!}"
                                                        alt="">
                                                </div>
                                                <div class="extend-info">
                                                    <span class="label-free-span bg-color-yellow"> miễn phí</span>
                                                </div>
                                            </div>
                                            <div class="comic">
                                                <picture class="bg-content-comic">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic4/bg.jpg") !!}"
                                                        alt="">
                                                </picture>
                                                <picture class="comic-avatar">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic4/avatar.png") !!}"
                                                        alt="">
                                                </picture>
                                                <div class="tranfer-comic"
                                                     style="background-image: linear-gradient(rgba(24, 31, 45, 0) 0%, rgba(24, 31, 45, 0.5) 33.04%, rgba(24, 31, 45, 0.9) 66.09%, rgb(24, 31, 45) 100%);">
                                                </div>
                                                <div class="comic-name">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic4/name.png") !!}"
                                                        alt="">
                                                </div>
                                                <div class="extend-info">
                                                    <span class="label-free-span bg-color-yellow"> miễn phí</span>
                                                </div>
                                            </div>
                                            <div class="comic">
                                                <picture class="bg-content-comic">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic5/bg.jpg") !!}"
                                                        alt="">
                                                </picture>
                                                <picture class="comic-avatar">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic5/avatar.png") !!}"
                                                        alt="">
                                                </picture>
                                                <div class="tranfer-comic"
                                                     style="background-image: linear-gradient(rgba(115, 0, 5, 0) 0%, rgba(115, 0, 5, 0.5) 33.04%, rgba(115, 0, 5, 0.9) 66.09%, rgb(115, 0, 5) 100%);">
                                                </div>
                                                <div class="comic-name">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic5/name.png") !!}"
                                                        alt="">
                                                </div>
                                                <div class="extend-info">
                                                    <span class="label-free-span bg-color-yellow"> miễn phí</span>
                                                </div>
                                            </div>
                                            <div class="comic">
                                                <picture class="bg-content-comic">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic6/bg.jpg") !!}"
                                                        alt="">
                                                </picture>
                                                <picture class="comic-avatar">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic6/avatar.png") !!}"
                                                        alt="">
                                                </picture>
                                                <div class="tranfer-comic"
                                                     style="background-image: linear-gradient(rgba(135, 182, 66, 0) 0%, rgba(135, 182, 66, 0.5) 33.04%, rgba(135, 182, 66, 0.9) 66.09%, rgb(135, 182, 66) 100%);">
                                                </div>
                                                <div class="comic-name">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic6/name.png") !!}"
                                                        alt="">
                                                </div>
                                                <div class="extend-info">
                                                    <span class="label-free-span bg-color-yellow"> miễn phí</span>
                                                </div>
                                            </div>
                                            <div class="comic">
                                                <picture class="bg-content-comic">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic1/bg.jpg") !!}"
                                                        alt="">
                                                </picture>
                                                <picture class="comic-avatar">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic1/avatar.png") !!}"
                                                        alt="">
                                                </picture>
                                                <div class="tranfer-comic"
                                                     style="background-image: linear-gradient(rgba(146, 114, 57, 0) 0%, rgba(146, 114, 57, 0.5) 33.04%, rgba(146, 114, 57, 0.9) 66.09%, rgb(146, 114, 57) 100%);">
                                                </div>
                                                <div class="comic-name">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic1/name.png") !!}"
                                                        alt="">
                                                </div>
                                                <div class="extend-info">
                                                    <span class="label-free-span bg-color-yellow"> miễn phí</span>
                                                </div>
                                            </div>
                                            <div class="comic">
                                                <picture class="bg-content-comic">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic2/bg.jpg") !!}"
                                                        alt="">
                                                </picture>
                                                <picture class="comic-avatar">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic2/avatar.png") !!}"
                                                        alt="">
                                                </picture>
                                                <div class="tranfer-comic"
                                                     style="background-image: linear-gradient(rgba(45, 102, 161, 0) 0%, rgba(45, 102, 161, 0.5) 33.04%, rgba(45, 102, 161, 0.9) 66.09%, rgb(45, 102, 161) 100%);">
                                                </div>
                                                <div class="comic-name">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic2/name.png") !!}"
                                                        alt="">
                                                </div>
                                                <div class="extend-info">
                                                    <span class="label-free-span bg-color-yellow"> miễn phí</span>
                                                </div>
                                            </div>
                                            <div class="comic">
                                                <picture class="bg-content-comic">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic3/bg.jpg") !!}"
                                                        alt="">
                                                </picture>
                                                <picture class="comic-avatar">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic3/avatar.png") !!}"
                                                        alt="">
                                                </picture>
                                                <div class="tranfer-comic"
                                                     style="background-image: linear-gradient(rgba(147, 81, 123, 0) 0%, rgba(147, 81, 123, 0.5) 33.04%, rgba(147, 81, 123, 0.9) 66.09%, rgb(147, 81, 123) 100%);">
                                                </div>
                                                <div class="comic-name">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic3/name.png") !!}"
                                                        alt="">
                                                </div>
                                                <div class="extend-info">
                                                    <span class="label-free-span bg-color-yellow"> miễn phí</span>
                                                </div>
                                            </div>
                                            <div class="comic">
                                                <picture class="bg-content-comic">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic4/bg.jpg") !!}"
                                                        alt="">
                                                </picture>
                                                <picture class="comic-avatar">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic4/avatar.png") !!}"
                                                        alt="">
                                                </picture>
                                                <div class="tranfer-comic"
                                                     style="background-image: linear-gradient(rgba(24, 31, 45, 0) 0%, rgba(24, 31, 45, 0.5) 33.04%, rgba(24, 31, 45, 0.9) 66.09%, rgb(24, 31, 45) 100%);">
                                                </div>
                                                <div class="comic-name">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic4/name.png") !!}"
                                                        alt="">
                                                </div>
                                                <div class="extend-info">
                                                    <span class="label-free-span bg-color-yellow"> miễn phí</span>
                                                </div>
                                            </div>
                                            <div class="comic">
                                                <picture class="bg-content-comic">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic5/bg.jpg") !!}"
                                                        alt="">
                                                </picture>
                                                <picture class="comic-avatar">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic5/avatar.png") !!}"
                                                        alt="">
                                                </picture>
                                                <div class="tranfer-comic"
                                                     style="background-image: linear-gradient(rgba(115, 0, 5, 0) 0%, rgba(115, 0, 5, 0.5) 33.04%, rgba(115, 0, 5, 0.9) 66.09%, rgb(115, 0, 5) 100%);">
                                                </div>
                                                <div class="comic-name">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic5/name.png") !!}"
                                                        alt="">
                                                </div>
                                                <div class="extend-info">
                                                    <span class="label-free-span bg-color-yellow"> miễn phí</span>
                                                </div>
                                            </div>
                                            <div class="comic">
                                                <picture class="bg-content-comic">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic6/bg.jpg") !!}"
                                                        alt="">
                                                </picture>
                                                <picture class="comic-avatar">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic6/avatar.png") !!}"
                                                        alt="">
                                                </picture>
                                                <div class="tranfer-comic"
                                                     style="background-image: linear-gradient(rgba(135, 182, 66, 0) 0%, rgba(135, 182, 66, 0.5) 33.04%, rgba(135, 182, 66, 0.9) 66.09%, rgb(135, 182, 66) 100%);">
                                                </div>
                                                <div class="comic-name">
                                                    <img
                                                        src="{!! asset("assets/images/detail1/relation/comic6/name.png") !!}"
                                                        alt="">
                                                </div>
                                                <div class="extend-info">
                                                    <span class="label-free-span bg-color-yellow"> miễn phí</span>
                                                </div>
                                            </div>


                                        </ul>
                                        <button id="next-slide" class="slide-button material-symbols-rounded">
                                            <img width="20" height="20"
                                                 src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMy4xNTY4IDguNTg1ODNMMTMuODYzOSA5LjI5MjkzQzE0LjI1NDQgOS42ODM0NiAxNC4yNTQ0IDEwLjMxNjYgMTMuODYzOSAxMC43MDcxTDEzLjE1NjggMTEuNDE0M0w4LjkxNDE0IDE1LjY1NjlDOC41MjM2MSAxNi4wNDc0IDcuODkwNDUgMTYuMDQ3NCA3LjQ5OTkyIDE1LjY1NjlDNy4xMDk0IDE1LjI2NjQgNy4xMDk0IDE0LjYzMzIgNy40OTk5MiAxNC4yNDI3TDExLjc0MjYgMTBMNy40OTk5MiA1Ljc1NzRDNy4xMDk0IDUuMzY2ODggNy4xMDk0IDQuNzMzNzEgNy40OTk5MiA0LjM0MzE5QzcuODkwNDUgMy45NTI2NiA4LjUyMzYxIDMuOTUyNjYgOC45MTQxNCA0LjM0MzE5TDEzLjE1NjggOC41ODU4M1oiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo="
                                                 alt="" class="">
                                        </button>
                                    </div>
                                    <div class="slider-scrollbar" style="display:none">
                                        <div class="scrollbar-track">
                                            <div class="scrollbar-thumb"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@section("addtional_scripts")
    <script src="{!! asset('assets/js/elements.js') !!}"></script>
    <script src="{!! asset('assets/js/header.js') !!}"></script>
    <script src="{!! asset('assets/js/slider.js') !!}"></script>
    <script src="{!! asset('assets/js/utils.js') !!}"></script>
    <script>

        window.addEventListener('load', (event) => {
            let tabcontent = document.querySelectorAll(".content-anchor");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            document.getElementById("content-tab").style.display = "block";

            document.querySelector('.back-button').addEventListener('click', function () {
                window.location.href = "/";
            });

            const container = document.getElementById('content-desc');
            const btnMore = document.getElementById('btn-more');
            btnMore.style.display = "flex";
            btnMore.addEventListener('click', (target) => {
                if (window.getComputedStyle(container).getPropertyValue('display') === 'block') {
                    container.style.display = '-webkit-box';
                    btnMore.style.removeProperty('transform');
                } else {
                    container.style.display = 'block';
                    btnMore.style.setProperty('transform', 'rotateZ(180deg)');
                }

            })

        });

        function changeTab(evt, tab) {
            let tabcontent = document.querySelectorAll(".content-anchor");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            let tablinks = document.querySelectorAll(".list-item > .item");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tab).style.display = "block";
            evt.currentTarget.parentElement.className += " active";
        }
    </script>
@endsection
