@extends("Frontend.layouts.master")
@section("header")
    <header class="header">

        <div class="fake-block-search"></div>
        <div id="block-search" class="block-search opacity-1">
            <div class="col-right">
                <a class="back-button" href="#">
                    <img
                        src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAzMiAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik00LjQxNzUzIDEwLjU4NThMNy45NDU2NiA3LjA1NzY4TDcuOTUzMDUgNy4wNTAyMkM4LjM0MzU3IDYuNjU5NjkgOC45NzY3NCA2LjY1OTY5IDkuMzY3MjYgNy4wNTAyMkM5Ljc1Nzc3IDcuNDQwNzMgOS43NTc3OSA4LjA3Mzg3IDkuMzY3MyA4LjQ2NDM5TDkuMzY3MzQgOC40NjQ0M0w2LjgzMTggMTFIMjguMDAwMkMyOC41NTI1IDExIDI5LjAwMDIgMTEuNDQ3NyAyOS4wMDAyIDEyQzI5LjAwMDIgMTIuNTUyMyAyOC41NTI1IDEzIDI4LjAwMDIgMTNINi44MzE2OUw5LjM2MTQ5IDE1LjUyOThMOS4zNjcyNiAxNS41MzU1QzkuNzU3NzkgMTUuOTI2IDkuNzU3NzkgMTYuNTU5MiA5LjM2NzI2IDE2Ljk0OTdDOC45NzY3NCAxNy4zNDAyIDguMzQzNTcgMTcuMzQwMiA3Ljk1MzA1IDE2Ljk0OTdMNy45NTMwNCAxNi45NDk3TDcuOTUzMDEgMTYuOTQ5N0w0LjAwMzI2IDEzSDQuMDAwMlYxMi45OTY5TDMuNzEwMzcgMTIuNzA3MUMzLjMxOTg1IDEyLjMxNjYgMy4zMTk4NSAxMS42ODM0IDMuNzEwMzcgMTEuMjkyOUw0LjAwMDIgMTEuMDAzVjExSDQuMDAzMjdMNC40MTc0OCAxMC41ODU4TDQuNDE3NTMgMTAuNTg1OFoiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo="
                        alt="back" width="32px" height="24px">
                </a>
            </div>
            <div class="col-center">
                <p class="chapter-name content-overflow">
                    {!! $comic?->chapter_name !!}
                </p>
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
        <div class="container-fluid">
            <div class="comic-content">
                <div class="list-img">
                    <div id="img-item" class="img-item">
                        @foreach($contentImages as $item)
                            <img src="{!! asset($item->link_img) !!}" alt="firemcomic" >
                        @endforeach
                        @php
                            unset($item);
                        @endphp
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="push-top-anchor">
                <button onclick="scrollToTop()" id="scrollToTopBtn" title="Go to top" class="push-top-bg">
                        <span>
                            <img
                                src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTUiIGhlaWdodD0iOSIgdmlld0JveD0iMCAwIDE1IDkiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMi43MjY2MiA2Ljk2OTY3QzMuMDE5NTEgNy4yNjI1NiAzLjQ5NDM5IDcuMjYyNTYgMy43ODcyOCA2Ljk2OTY3TDcuNDk5OTUgMy4yNTdMMTEuMjEyNiA2Ljk2OTY3QzExLjUwNTUgNy4yNjI1NiAxMS45ODA0IDcuMjYyNTYgMTIuMjczMyA2Ljk2OTY3QzEyLjU2NjIgNi42NzY3OCAxMi41NjYyIDYuMjAxOSAxMi4yNzMzIDUuOTA5MDFMOC4yMDcwNiAxLjg0Mjc5QzcuODE2NTMgMS40NTIyNiA3LjE4MzM3IDEuNDUyMjYgNi43OTI4NCAxLjg0Mjc5TDIuNzI2NjIgNS45MDkwMUMyLjQzMzczIDYuMjAxOSAyLjQzMzczIDYuNjc2NzggMi43MjY2MiA2Ljk2OTY3WiIgZmlsbD0iYmxhY2siLz4KPC9zdmc+Cg=="
                                alt="" width="15" height="9" class="mr-5">
                            <span style="vertical-align: inherit;">Di Chuyển Lên Đầu</span>
                        </span>
                </button>
            </div>
            <div class="wrapper-content">
                <div class="bg-content bg-pr-detail"></div>

                <div class="content-anchor">
                    <div class="cards">
{{--                        <div class="ads card-pr-detail">--}}
{{--                            <div class="content">--}}
{{--                                <div class="content-body">--}}
{{--                                    <div class="ads-img">--}}
{{--                                        <img src="{!! asset("assets/images/detail1/ads/ads1.jpg") !!}" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="ads-content">--}}
{{--                                            <span class="ads-tittle content-overflow">--}}
{{--                                                Toàn bộ phô mai mozza? Bánh wafer mozza nguyên miếng của Burger King--}}
{{--                                                xuất hiện--}}
{{--                                            </span>--}}
{{--                                        <a href="" class="ads-link">Phím tắt</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="like-card card-pr-detail">--}}
{{--                            <div class="content">--}}
{{--                                <div class="content-body">--}}
{{--                                    <h3 class="like-tittle">--}}
{{--                                        {{ $comic?->comic?->total_view ?? '' }}--}}
{{--                                    </h3>--}}
{{--                                    <div class="like-img">--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 160" width="160"--}}
{{--                                             height="160" preserveAspectRatio="xMidYMid meet"--}}
{{--                                             style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px);">--}}
{{--                                            <defs>--}}
{{--                                                <clipPath id="__lottie_element_92">--}}
{{--                                                    <rect width="160" height="160" x="0" y="0"></rect>--}}
{{--                                                </clipPath>--}}
{{--                                            </defs>--}}
{{--                                            <g clip-path="url(#__lottie_element_92)">--}}
{{--                                                <g transform="matrix(1,0,0,1,-25,0.5)" opacity="1"--}}
{{--                                                   style="display: block;">--}}
{{--                                                    <g opacity="1"--}}
{{--                                                       transform="matrix(1,0,0,1,104.9990005493164,79.31400299072266)">--}}
{{--                                                        <path fill="rgb(254,254,255)" fill-opacity="1"--}}
{{--                                                              d=" M-26.094999313354492,-6.776000022888184 C-26.094999313354492,-6.776000022888184 -27.26099967956543,-6.776000022888184 -27.26099967956543,-6.776000022888184 C-27.26099967956543,-6.776000022888184 -26.097000122070312,-6.7729997634887695 -26.097000122070312,-6.7729997634887695 C-26.097000122070312,-6.7729997634887695 -26.094999313354492,-6.776000022888184 -26.094999313354492,-6.776000022888184z M41.262001037597656,-16.722999572753906 C41.262001037597656,-16.722999572753906 16.54400062561035,-16.722999572753906 16.54400062561035,-16.722999572753906 C16.54400062561035,-16.722999572753906 19.424999237060547,-38.229000091552734 19.424999237060547,-38.229000091552734 C20.187999725341797,-43.92300033569336 16.799999237060547,-49.35599899291992 11.35200023651123,-51.17900085449219 C11.35200023651123,-51.17900085449219 5.699999809265137,-53.069000244140625 5.699999809265137,-53.069000244140625 C5.2789998054504395,-53.209999084472656 4.85099983215332,-53.277000427246094 4.429999828338623,-53.277000427246094 C2.7790000438690186,-53.277000427246094 1.2359999418258667,-52.24599838256836 0.6579999923706055,-50.604000091552734 C0.6579999923706055,-50.604000091552734 -5.573999881744385,-32.909000396728516 -5.573999881744385,-32.909000396728516 C-5.573999881744385,-32.909000396728516 -26.094999313354492,-6.776000022888184 -26.094999313354492,-6.776000022888184 C-26.094999313354492,-6.776000022888184 -26.097999572753906,-6.771999835968018 -26.097999572753906,-6.771999835968018 C-26.097999572753906,-6.771999835968018 -27.26099967956543,-6.776000022888184 -27.26099967956543,-6.776000022888184 C-27.26099967956543,-6.776000022888184 -53.262001037597656,-6.776000022888184 -53.262001037597656,-6.776000022888184 C-53.262001037597656,-6.776000022888184 -53.262001037597656,53.2239990234375 -53.262001037597656,53.2239990234375 C-53.262001037597656,53.2239990234375 -27.26099967956543,53.2239990234375 -27.26099967956543,53.2239990234375 C-27.26099967956543,53.2239990234375 -27.26099967956543,53.277000427246094 -27.26099967956543,53.277000427246094 C-27.26099967956543,53.277000427246094 30.570999145507812,53.277000427246094 30.570999145507812,53.277000427246094 C39.70800018310547,53.277000427246094 47.39400100708008,46.43299865722656 48.45000076293945,37.356998443603516 C48.45000076293945,37.356998443603516 53.18199920654297,-3.3359999656677246 53.18199920654297,-3.3359999656677246 C53.236000061035156,-3.7960000038146973 53.262001037597656,-4.258999824523926 53.262001037597656,-4.7230000495910645 C53.262001037597656,-11.350000381469727 47.88999938964844,-16.722999572753906 41.262001037597656,-16.722999572753906z M-26.097999572753906,46.2239990234375 C-26.097999572753906,46.2239990234375 -27.26099967956543,46.2239990234375 -27.26099967956543,46.2239990234375 C-27.26099967956543,46.2239990234375 -46.262001037597656,46.2239990234375 -46.262001037597656,46.2239990234375 C-46.262001037597656,46.2239990234375 -46.262001037597656,0.2240000069141388 -46.262001037597656,0.2240000069141388 C-46.262001037597656,0.2240000069141388 -27.26099967956543,0.2240000069141388 -27.26099967956543,0.2240000069141388 C-27.26099967956543,0.2240000069141388 -26.097999572753906,0.2240000069141388 -26.097999572753906,0.2240000069141388 C-26.097999572753906,0.2240000069141388 -26.097999572753906,46.2239990234375 -26.097999572753906,46.2239990234375z M46.229000091552734,-4.144999980926514 C46.229000091552734,-4.144999980926514 41.49700164794922,36.54800033569336 41.49700164794922,36.54800033569336 C40.85200119018555,42.095001220703125 36.154998779296875,46.277000427246094 30.570999145507812,46.277000427246094 C30.570999145507812,46.277000427246094 -19.097999572753906,46.277000427246094 -19.097999572753906,46.277000427246094 C-19.097999572753906,46.277000427246094 -19.097999572753906,-4.3520002365112305 -19.097999572753906,-4.3520002365112305 C-19.097999572753906,-4.3520002365112305 -0.06800000369548798,-28.584999084472656 -0.06800000369548798,-28.584999084472656 C-0.06800000369548798,-28.584999084472656 0.6449999809265137,-29.493999481201172 0.6449999809265137,-29.493999481201172 C0.6449999809265137,-29.493999481201172 1.0290000438690186,-30.58300018310547 1.0290000438690186,-30.58300018310547 C1.0290000438690186,-30.58300018310547 6.28000020980835,-45.49399948120117 6.28000020980835,-45.49399948120117 C6.28000020980835,-45.49399948120117 9.130999565124512,-44.540000915527344 9.130999565124512,-44.540000915527344 C11.392999649047852,-43.784000396728516 12.803999900817871,-41.52000045776367 12.48799991607666,-39.159000396728516 C12.48799991607666,-39.159000396728516 9.605999946594238,-17.652000427246094 9.605999946594238,-17.652000427246094 C9.605999946594238,-17.652000427246094 8.543000221252441,-9.722999572753906 8.543000221252441,-9.722999572753906 C8.543000221252441,-9.722999572753906 16.54400062561035,-9.722999572753906 16.54400062561035,-9.722999572753906 C16.54400062561035,-9.722999572753906 41.262001037597656,-9.722999572753906 41.262001037597656,-9.722999572753906 C44.02000045776367,-9.722999572753906 46.262001037597656,-7.479000091552734 46.262001037597656,-4.7230000495910645 C46.262001037597656,-4.53000020980835 46.250999450683594,-4.335999965667725 46.229000091552734,-4.144999980926514z">--}}
{{--                                                        </path>--}}
{{--                                                    </g>--}}
{{--                                                </g>--}}
{{--                                                <g style="display: none;">--}}
{{--                                                    <g>--}}
{{--                                                        <path></path>--}}
{{--                                                    </g>--}}
{{--                                                    <g>--}}
{{--                                                        <path></path>--}}
{{--                                                    </g>--}}
{{--                                                </g>--}}
{{--                                            </g>--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        {{--                        <div class="card card-pr-detail">--}}
                        {{--                            <div class="header">--}}
                        {{--                                <div class="content-header">--}}
                        {{--                                    <a href="" class="row-header">--}}
                        {{--                                        <h3 class="tittle-comment-header">12 bình luận</h3>--}}
                        {{--                                        <div class="small-arrow">--}}
                        {{--                                            <img--}}
                        {{--                                                src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgb3BhY2l0eT0iMC4xIiB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHJ4PSIxMiIgZmlsbD0id2hpdGUiLz4KPHBhdGggZD0iTTExLjQ3NzYgNy40MDM5M0wxMS40NzUzIDcuNDA2MTdDMTEuMTMxNSA3LjExNjE5IDEwLjYxNyA3LjEzMzEyIDEwLjI5MzEgNy40NTY5N0M5Ljk2OTMgNy43ODA4MSA5Ljk1MjM3IDguMjk1MzUgMTAuMjQyNCA4LjYzOTEzTDEwLjI0MDEgOC42NDEzN0wxMy41OTg5IDEyLjAwMDFMMTAuMjQwMSAxNS4zNTg5TDEwLjI0MjQgMTUuMzYxMUM5Ljk1MjM3IDE1LjcwNDkgOS45NjkzIDE2LjIxOTQgMTAuMjkzMSAxNi41NDMzQzEwLjYxNyAxNi44NjcxIDExLjEzMTUgMTYuODg0MSAxMS40NzUzIDE2LjU5NDFMMTEuNDc3NSAxNi41OTYzTDExLjUzMDYgMTYuNTQzM0wxNS41MDgxIDEyLjU2NThDMTUuODIwNSAxMi4yNTM0IDE1LjgyMDUgMTEuNzQ2OSAxNS41MDgxIDExLjQzNDRMMTEuNDc3NiA3LjQwMzkzWiIgZmlsbD0id2hpdGUiLz4KPC9zdmc+Cg=="--}}
                        {{--                                                class="w-24 h-24" alt="">--}}
                        {{--                                        </div>--}}
                        {{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="content">--}}
                        {{--                                <div class="content-body">--}}
                        {{--                                    <div class="list-comment">--}}
                        {{--                                        <div class="comment">--}}
                        {{--                                            <div class="header-comment">--}}
                        {{--                                                <div class="tittle-comment">--}}
                        {{--                                                    <div class="tittle-comment-img">--}}
                        {{--                                                        <img src="{!! asset("assets/images/best.svg") !!}"--}}
                        {{--                                                             alt="TỐT NHẤT">--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <p class="tittle-comment-user"> Nguời không xác định</p>--}}
                        {{--                                                </div>--}}
                        {{--                                                <div class="date-comment">--}}
                        {{--                                                    <span>15.7.23</span>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="content-comment">--}}
                        {{--                                                <div class="content content-overflow">--}}
                        {{--                                                    Trước hết, các cơ quan liên quan đến sự sống còn như mắt, thận,--}}
                        {{--                                                    gan,… được cho mượn (tất cả các chi phí phẫu thuật liên quan--}}
                        {{--                                                    cũng được miễn), chúng tôi ấn định ngày hết hạn và cho bạn lựa--}}
                        {{--                                                    chọn trong khoảng thời gian đó. Bạn có muốn không? loại bỏ mắt--}}
                        {{--                                                    hoặc nội tạng, hay chúng tôi sẽ làm việc đó (bây giờ bạn tự thú--}}
                        {{--                                                    với tư cách là nghi phạm giết người)?) Bạn có định làm điều đó--}}
                        {{--                                                    không? Sau đó, tôi sẽ chỉ suy luận rằng bạn sẽ làm những gì bạn--}}
                        {{--                                                    được yêu cầu làm.--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}

                        {{--                                        <div class="comment">--}}
                        {{--                                            <div class="header-comment">--}}
                        {{--                                                <div class="tittle-comment">--}}
                        {{--                                                    <div class="tittle-comment-img">--}}
                        {{--                                                        <img src="{!! asset("assets/images/best.svg") !!}"--}}
                        {{--                                                             alt="TỐT NHẤT">--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <p class="tittle-comment-user"> Nguời không xác định</p>--}}
                        {{--                                                </div>--}}
                        {{--                                                <div class="date-comment">--}}
                        {{--                                                    <span>15.7.23</span>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="content-comment">--}}
                        {{--                                                <div class="content content-overflow">--}}
                        {{--                                                    Trước hết, các cơ quan liên quan đến sự sống còn như mắt, thận,--}}
                        {{--                                                    gan,… được cho mượn (tất cả các chi phí phẫu thuật liên quan--}}
                        {{--                                                    cũng được miễn), chúng tôi ấn định ngày hết hạn và cho bạn lựa--}}
                        {{--                                                    chọn trong khoảng thời gian đó. Bạn có muốn không? loại bỏ mắt--}}
                        {{--                                                    hoặc nội tạng, hay chúng tôi sẽ làm việc đó (bây giờ bạn tự thú--}}
                        {{--                                                    với tư cách là nghi phạm giết người)?) Bạn có định làm điều đó--}}
                        {{--                                                    không? Sau đó, tôi sẽ chỉ suy luận rằng bạn sẽ làm những gì bạn--}}
                        {{--                                                    được yêu cầu làm.--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <div class="card card-pr-detail">
                            <div class="content">
                                <div class="content-body">
                                    <a href="{{ route('view-comic',['comic_code' => ($comic?->comic?->comic_code)??$comic_code,'id' => ($comic?->nextChapter?$comic?->nextChapter?->id:$comic?->id)??'1' ]) }}"
                                       class="next-chapter">
                                        <div class="next-chapter-img">
                                            <img
                                                src="{!! asset($comic?->nextChapter?$comic?->nextChapter?->link_small_icon:$comic?->link_small_icon) !!}"
                                                alt="">
                                        </div>
                                        <div class="next-chapter-info">
                                            <p class="chapter-number content-overflow">
                                                {{ $comic?->nextChapter ? $comic?->nextChapter?->chapter_name : $comic?->chapter_name }}
                                            </p>
                                            <span class="type content-overflow">miễn phí</span>
                                        </div>
                                        <div class="small-arrow">
                                            <img
                                                src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgb3BhY2l0eT0iMC4xIiB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHJ4PSIxMiIgZmlsbD0id2hpdGUiLz4KPHBhdGggZD0iTTExLjQ3NzYgNy40MDM5M0wxMS40NzUzIDcuNDA2MTdDMTEuMTMxNSA3LjExNjE5IDEwLjYxNyA3LjEzMzEyIDEwLjI5MzEgNy40NTY5N0M5Ljk2OTMgNy43ODA4MSA5Ljk1MjM3IDguMjk1MzUgMTAuMjQyNCA4LjYzOTEzTDEwLjI0MDEgOC42NDEzN0wxMy41OTg5IDEyLjAwMDFMMTAuMjQwMSAxNS4zNTg5TDEwLjI0MjQgMTUuMzYxMUM5Ljk1MjM3IDE1LjcwNDkgOS45NjkzIDE2LjIxOTQgMTAuMjkzMSAxNi41NDMzQzEwLjYxNyAxNi44NjcxIDExLjEzMTUgMTYuODg0MSAxMS40NzUzIDE2LjU5NDFMMTEuNDc3NSAxNi41OTYzTDExLjUzMDYgMTYuNTQzM0wxNS41MDgxIDEyLjU2NThDMTUuODIwNSAxMi4yNTM0IDE1LjgyMDUgMTEuNzQ2OSAxNS41MDgxIDExLjQzNDRMMTEuNDc3NiA3LjQwMzkzWiIgZmlsbD0id2hpdGUiLz4KPC9zdmc+Cg=="
                                                class="w-24 h-24" alt="">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card card-pr-detail">
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
                                            @include('Frontend.components.relation-cards.cards')
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
        <div class="container-fluid bottom-navigationBar">
            <div id="navigationBar-content" class="navigationBar-content">
                <button class="navigationBar-content-left">
                    <img
                        src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik02LjEzODQ2IDEyLjYzMTJDNi4xNTk4MiAxMi42NTczIDYuMTgyNyAxMi42ODI3IDYuMjA3MTEgMTIuNzA3MUw2LjkxNDIxIDEzLjQxNDJMMTMuMjc4MiAxOS43NzgyQzEzLjY2ODcgMjAuMTY4NyAxNC4zMDE5IDIwLjE2ODcgMTQuNjkyNCAxOS43NzgyQzE1LjA4MjkgMTkuMzg3NyAxNS4wODI5IDE4Ljc1NDUgMTQuNjkyNCAxOC4zNjRMOC4zMjg0MyAxMkwxNC42ODU2IDUuNjQyODhMMTQuNjkyNCA1LjYzNjA3QzE1LjA4MjkgNS4yNDU1NSAxNS4wODI5IDQuNjEyMzggMTQuNjkyNCA0LjIyMTg2QzE0LjMwMTkgMy44MzEzMyAxMy42Njg3IDMuODMxMzMgMTMuMjc4MiA0LjIyMTg2TDEzLjI3ODIgNC4yMjE4M0w2LjkxNDIxIDEwLjU4NThMNi4yMDcxMSAxMS4yOTI5QzUuODQwOTkgMTEuNjU5IDUuODE4MTEgMTIuMjM4NCA2LjEzODQ2IDEyLjYzMTJaIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K"
                        width="24" height="24" alt="prev">
                </button>
                <div class="navigationBar-content-comment">
                    <img  src="{!! asset("assets/images/logo.png") !!}" alt="">
                </div>
{{--                <button class="navigationBar-content-comment">--}}
{{--                    <img--}}
{{--                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgdmlld0JveD0iMCAwIDMyIDMyIj4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPGcgZmlsbD0iI0ZGRiIgZmlsbC1ydWxlPSJub256ZXJvIj4KICAgICAgICAgICAgPGc+CiAgICAgICAgICAgICAgICA8Zz4KICAgICAgICAgICAgICAgICAgICA8Zz4KICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggZD0iTTE3LjUgNS41YzUuMjQ3IDAgOS41IDQuMjUzIDkuNSA5LjVzLTQuMjUzIDkuNS05LjUgOS41SDE1bC02IDN2LTQuNzUzQzYuNTggMjEuMDI1IDUgMTguMTk3IDUgMTVjMC01LjI0NyA0LjI1My05LjUgOS41LTkuNWgzem0wIDJoLTNDMTAuMzU4IDcuNSA3IDEwLjg1OCA3IDE1YzAgMi43ODIgMS41MTUgNS4yMSAzLjc2NSA2LjUwNWwuMjM1LjEzdjIuNjE1bDMuNDk5LTEuNzVIMTcuNWM0LjE0MiAwIDcuNS0zLjM1OCA3LjUtNy41IDAtNC4wNi0zLjIyNy03LjM2OC03LjI1Ny03LjQ5NkwxNy41IDcuNXoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0xMDQuMDAwMDAwLCAtNzQwLjAwMDAwMCkgdHJhbnNsYXRlKDIwLjAwMDAwMCwgNzMwLjAwMDAwMCkgdHJhbnNsYXRlKDE2LjAwMDAwMCwgMTAuMDAwMDAwKSB0cmFuc2xhdGUoNjguMDAwMDAwLCAwLjAwMDAwMCkiLz4KICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgIDwvZz4KICAgICAgICA8L2c+CiAgICA8L2c+Cjwvc3ZnPgo="--}}
{{--                        width="32" height="32" alt="comment">--}}

{{--                </button>--}}
{{--                <button class="navigationBar-content-play">--}}
{{--                    <img--}}
{{--                        src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTcuNSA1LjEzNTExQzcuNSA0Ljc0NzQ5IDcuOTIxOTcgNC41MDcyOCA4LjI1NTI3IDQuNzA1MThMMTkuODE3MiAxMS41NzAxQzIwLjE0MzUgMTEuNzYzOCAyMC4xNDM1IDEyLjIzNjIgMTkuODE3MiAxMi40Mjk5TDguMjU1MjcgMTkuMjk0OEM3LjkyMTk3IDE5LjQ5MjcgNy41IDE5LjI1MjUgNy41IDE4Ljg2NDlWNS4xMzUxMVoiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS13aWR0aD0iMiIvPgo8L3N2Zz4K"--}}
{{--                        width="24" height="24" alt="auto scroll">--}}
{{--                </button>--}}

                <button class="navigationBar-content-right">
                    <img
                        src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xNy44NjE1IDEyLjYzMTJDMTcuODQwMiAxMi42NTczIDE3LjgxNzMgMTIuNjgyNyAxNy43OTI5IDEyLjcwNzFMMTcuMDg1OCAxMy40MTQyTDEwLjcyMTggMTkuNzc4MkMxMC4zMzEzIDIwLjE2ODcgOS42OTgxNCAyMC4xNjg3IDkuMzA3NjEgMTkuNzc4MkM4LjkxNzA5IDE5LjM4NzcgOC45MTcwOSAxOC43NTQ1IDkuMzA3NjEgMTguMzY0TDE1LjY3MTYgMTJMOS4zMTQ0NSA1LjY0Mjg4TDkuMzA3NTggNS42MzYwN0M4LjkxNzA2IDUuMjQ1NTUgOC45MTcwNiA0LjYxMjM4IDkuMzA3NTggNC4yMjE4NkM5LjY5ODEgMy44MzEzMyAxMC4zMzEzIDMuODMxMzMgMTAuNzIxOCA0LjIyMTg2TDEwLjcyMTggNC4yMjE4M0wxNy4wODU4IDEwLjU4NThMMTcuNzkyOSAxMS4yOTI5QzE4LjE1OSAxMS42NTkgMTguMTgxOSAxMi4yMzg0IDE3Ljg2MTUgMTIuNjMxMloiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo="
                        width="24" height="24" alt="next">
                </button>
            </div>
        </div>
    </div>

@endsection

@section("addtional_scripts")
    <script src="{!! asset('assets/js/elements.js') !!}"></script>
    <script src="{!! asset("assets/js/product-detail.js") !!}"></script>
    <script src="{!! asset("assets/js/utils.js") !!}"></script>
    <script src="{!! asset("assets/js/header-pr-detail.js") !!}"></script>
    <script src="{!! asset("assets/js/slider.js") !!}"></script>
    <script >
        document.addEventListener("DOMContentLoaded", function () {
            new IOlazy({
                image: 'img',
                threshold: 0.1,
            });
        });
    </script>
    <script>
        const currentUrl = `{{ route('ajax.comics.chapters.show',['comic_code'=>($comic?->comic?->comic_code)??$comic_code,'id'=>($comic?->id)??'1']) }}`;
        const spinImgurl = "{!! getLinkSpinImg() !!}"
        let isLoadComplete = true
        let isStopLoad = false;
        let lazyImageObserver;
        localStorage.setItem('currentPage', {{ $contentImages->currentPage() }});
        localStorage.setItem('limit', {{ $contentImages->perPage() }});

        document.addEventListener("DOMContentLoaded", function () {
             lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const lazyImage = entry.target;
                        lazyImage.src = lazyImage.dataset.src;
                        lazyImage.removeAttribute('data-src');
                        lazyImageObserver.unobserve(lazyImage);
                    }
                });
            },{
                root: null, // Quan sát theo viewport
                rootMargin: '0px', // Không có margin xung quanh phần tử gốc
                threshold: 0.1 // Kích hoạt sự kiện khi phần tử hiển thị ít nhất 10% trong vùng nhìn thấy
            });
        });

        window.addEventListener('load', (event) => {

            const link_bg_preview = $(`#img-item`)

            window.addEventListener('scroll', function () {
                    // moi khi scroll thi moi tai img
                    if (isLoadComplete && !isStopLoad) {
                        isLoadComplete = false
                        let page = parseInt(localStorage.getItem('currentPage')) + 1 ?? 1;
                        const context = {
                            'X-CSRF-TOKEN': `{{ csrf_token() }}`,
                        }
                        apiGet(context, currentUrl + `?page=${page}&XDEBUG_SESSION_START=14087`)
                            .then(response => {
                                let data = response.data.data
                                if(data && data.length <1){
                                    isStopLoad =true;
                                    return
                                }
                                if(data.length>=1){
                                    data.forEach(item => {
                                        let newElement = $(`<img class="lazyload" src="${spinImgurl}" data-src="${item.link_img}" alt="firemcomic">`)
                                        link_bg_preview.append(newElement);
                                        lazyImageObserver.observe(newElement.get(0));
                                    })
                                }


                                let page = parseInt(localStorage.getItem('currentPage'))+1
                                localStorage.setItem('currentPage', page);
                            })
                            .catch(error => {
                                console.log(error)
                            }).finally(() => {
                            isLoadComplete = true;
                        });
                    }
            });

            console.log('Trang web đã tải hoàn tất');
            document.getElementById('preloader').setAttribute("style", "display:none");
            fakeHeaderMenu.style.opacity = 1;
            document.querySelector('.back-button').addEventListener('click', function () {
                window.location.href = "{{ route('comic-info', ['comic_code' =>$comic?->comic?->comic_code ]) }}";
            });

            document.querySelector('.navigationBar-content-comment').addEventListener('click', function () {
                window.location.href = "{{ route('landingPage') }}";
            });

            document.querySelector('.navigationBar-content-right').addEventListener('click', function () {
                window.location.href = "{{ route('view-comic', ['comic_code' => $comic?->comic?->comic_code,'id' => $comic?->nextChapter?$comic?->nextChapter?->id:$comic?->id]) }}";
            });
            document.querySelector('.navigationBar-content-left').addEventListener('click', function () {
                window.location.href = "{{ route('view-comic', ['comic_code' => $comic?->comic?->comic_code,'id' => $comic->prvChapter?$comic?->prvChapter?->id:$comic?->id]) }}";
            });

        });
    </script>
@endsection
