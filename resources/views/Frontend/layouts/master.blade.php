<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Firecomic</title>
    <meta name="twitter:title" content="Firecomic">
    <meta property="og:title" content="Firecomic">
    <meta name="theme-color" content="#121212">
    <meta name="description"
          content="Khám phá comic kích thích trí tưởng tượng của bạn tại Firecomic. Bạn có thể thưởng thức COMIC mới thuộc nhiều thể loại khác nhau!">
    <meta name="keywords" content="It's free if you wait, free comics">
    <meta property="og:site_name" content="Firecomic">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{!! asset("assets/images/logo.png") !!}">
    <meta property="og:locale" content="vi">
    <meta property="og:description"
          content="Khám phá comic kích thích trí tưởng tượng của bạn tại Firecomic. Bạn có thể thưởng thức COMIC mới thuộc nhiều thể loại khác nhau!">
    <meta property="og:url" content="https://firecomic.onrender.com">
    <meta name="twitter:description"
          content="Khám phá comic kích thích trí tưởng tượng của bạn tại Firecomic. Bạn có thể thưởng thức COMIC mới thuộc nhiều thể loại khác nhau!">
    <meta name="twitter:image" content="{!! asset("assets/images/logo.png") !!}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@kakaowebtoon_kr">
    <meta name="twitter:url" content="https://firecomic.onrender.com">
    <link rel="canonical" href="https://firecomic.onrender.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{!! asset("assets/images/logo.png") !!}"
          type="image/x-icon">
    <link rel="icon" href="{!! asset("assets/images/logo.png") !!}"
          sizes="144x144">
    <link rel="apple-touch-icon" href="{!! asset("assets/images/logo.png") !!}">
    <meta name="next-head-count" content="25">

    <link rel="stylesheet" href="{!! asset('assets/css/styles.css') !!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
@include('Frontend.layouts.loader')
<div class="wrapper">
    @yield('header')
    @yield('main-content')
    @yield('footer')
</div>

{{--@include('Frontend.layouts.footer')--}}
<script src="{!! asset('assets/js/menu.js') !!}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{!! asset('assets/js/api/apiResource.js') !!}"></script>
<script src="{!! asset('assets/js/axios/axios.min.js') !!}"></script>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=IntersectionObserver"></script>

<script src="{!! asset('assets/js/iolazy.min.js') !!}"></script>
@yield('addtional_scripts')
<script>
    // document.onkeydown = function (event) {
    //     if (event.keyCode == 123) {
    //         return false;
    //     }
    // }
    //
    // document.addEventListener('contextmenu', function (event) {
    //     event.preventDefault();
    // });

    window.addEventListener('load', (event) => {
        console.log('Trang web đã tải hoàn tất');
        document.getElementById('preloader').setAttribute("style", "display:none");
    });

    if ('') {
        $(".mask-sl").addClass("active-sl");
    }

    if ('') {
        console.log('')
        document.getElementById("short_link_1").removeAttribute("href");
        document.getElementById("short_link_1").onclick = function () {
            return false;
        };
        document.getElementById("short_link_1").style.color = "gray";
    }

    if ('') {
        console.log('')
        document.getElementById("short_link_2").removeAttribute("href");
        document.getElementById("short_link_2").onclick = function () {
            return false;
        };
        document.getElementById("short_link_2").style.color = "gray";
    }
</script>
</body>

</html>
