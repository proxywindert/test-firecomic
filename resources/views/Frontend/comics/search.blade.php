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
            <div class="cards">
                @foreach($comics as $comic)
                    <div class="card">
                        <a href="{{ route('comic-info', ['comic_code' => $comic->comic_code]) }}">
                            <picture>
                                <img class="bg-img" src="{!! asset($comic->link_bg) !!}"
                                     alt="">
                            </picture>
                            <picture>
                                <img class="char-img"
                                     src="{!! asset($comic->link_avatar) !!}" alt="">
                            </picture>
                            <div class="label-time-content">
                                <div class="time">
                                    <img src="{!! asset("assets/images/time-border.svg") !!}" alt="">
                                    <span>3 tuần trước</span>
                                </div>
                                <div class="comic-name">
                                    <img src="{!! asset($comic->link_comic_name) !!}" alt="">
                                </div>
                            </div>
                            <div class="chapter">
                                <span>5 Chap</span>
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
