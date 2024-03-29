<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FIRE COMIC</title>
    <meta name="twitter:title" content="FIRE COMIC">
    <meta property="og:title" content="FIRE COMIC">
    <meta name="theme-color" content="#121212">
    <meta name="description"
          content="Khám phá comic kích thích trí tưởng tượng của bạn tại FIRE COMIC. Bạn có thể thưởng thức COMIC mới thuộc nhiều thể loại khác nhau!">
    <meta name="keywords" content="It's free if you wait, free comics">
    <meta property="og:site_name" content="FIRE COMIC">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://firecomic.hioncoding.com/libs/client/images/common/logo.png?v=20240118">
    <meta property="og:locale" content="vi">
    <meta property="og:description"
          content="Khám phá comic kích thích trí tưởng tượng của bạn tại FIRE COMIC. Bạn có thể thưởng thức COMIC mới thuộc nhiều thể loại khác nhau!">
    <meta property="og:url" content="https://firecomic.hioncoding.com">
    <meta name="twitter:description"
          content="Khám phá comic kích thích trí tưởng tượng của bạn tại FIRE COMIC. Bạn có thể thưởng thức COMIC mới thuộc nhiều thể loại khác nhau!">
    <meta name="twitter:image" content="https://firecomic.hioncoding.com/libs/client/images/common/logo.png?v=20240118">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@kakaowebtoon_kr">
    <meta name="twitter:url" content="https://firecomic.hioncoding.com">
    <link rel="canonical" href="https://firecomic.hioncoding.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="https://firecomic.hioncoding.com/libs/client/images/common/logo.png?v=20240118"
          type="image/x-icon">
    <link rel="icon" href="https://firecomic.hioncoding.com/libs/client/images/common/logo.png?v=20240118"
          sizes="144x144">
    <link rel="apple-touch-icon" href="https://firecomic.hioncoding.com/libs/client/images/common/logo.png?v=20240118">
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
