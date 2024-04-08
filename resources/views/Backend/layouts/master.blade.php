<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>firecomic</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/templates/css/contain/common-dashboard.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/templates/css/bower_components/fontawesome-free/css/all.min.css') !!}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
@yield('addtional_style')
@include('Frontend.layouts.loader')
<div class="wrapper">
    @include('Backend.layouts.header')
    @include('Backend.layouts.left_bar')
    @yield('content')
    @include('Backend.layouts.footer')

</div>

<script src="{!! asset('assets/admin/templates/js/bower_components/jquery/dist/jquery.min.js') !!}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{!! asset('assets/admin/templates/js/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('assets/admin/templates/js/axios/axios.min.js') !!}"></script>
<script src="{!! asset('assets/admin/templates/js/toast/toast.js') !!}"></script>
<!-- ChartJS -->
{{--<script src="{!! asset('assets/admin/templates/js/bower_components/chart.js/Chart.js') !!}"></script>--}}
<!-- FastClick -->
{{--<script src="{!! asset('assets/admin/templates/js/bower_components/fastclick/lib/fastclick.js') !!}"></script>--}}
<!-- AdminLTE App -->
<script src="{!! asset('assets/admin/templates/js/dist/js/adminlte.min.js') !!}"></script>
<script src="{!! asset('assets/admin/templates/js/api/apiResource.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="{!! asset('assets/admin/templates/js/dist/js/demo.js') !!}"></script>--}}
{{--<script src="{!! asset('assets/admin/templates/js/bower_components/Flot/jquery.flot.js') !!}"></script>--}}

<!-- date-range-picker -->
<script src="{!! asset('assets/admin/templates/js/bower_components/moment/min/moment.min.js') !!}"></script>
{{--<script src="{!! asset('assets/admin/templates/js/bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>--}}
<!-- bootstrap datepicker -->
{{--<script src="{!! asset('assets/admin/templates/js/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}"></script>--}}
<!-- bootstrap color picker -->
{{--<script src="{!! asset('assets/admin/templates/js/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') !!}"></script>--}}
<!-- bootstrap time picker -->
{{--<script src="{!! asset('assets/admin/templates/js/plugins/timepicker/bootstrap-timepicker.min.js') !!}"></script>--}}
<!-- bootstrap datetimepicker -->
<script src="{!! asset('assets/admin/templates/js/bower_components/bootstrap-datetimepicker/dist/js/bootstrap-datetimepicker.min.js') !!}"></script>
<script src="{!! asset('assets/admin/templates/js/bower_components/bootstrap-datetimepicker/dist/js/bootstrap-datetimepicker.js') !!}"></script>

{{--<script src="{!! asset('assets/admin/templates/js/plugins/input-mask/jquery.inputmask.js') !!}"></script>--}}
{{--<script src="{!! asset('assets/admin/templates/js/plugins/input-mask/jquery.inputmask.date.extensions.js') !!}"></script>--}}
{{--<script src="{!! asset('assets/admin/templates/js/plugins/input-mask/jquery.inputmask.extensions.js') !!}"></script>--}}


<script src="{!! asset('assets/admin/templates/js/go_to_top/go_to_top.js') !!}"></script>
@yield('addtional_scripts')

<script>

    var url = window.location.href;
    // var path = window.location.pathname;
    $(document).ready(function () {
        document.getElementById('preloader').setAttribute("style", "display:none");
        // alert(url);
        var path = url.split('/')[3];
        $('.sidebar-menu li').each(function () {
            var href = $(this).find('a').attr('href');
            if (!href)
                return
            if(url == href || url.split('?')[0] == href){
                $(this).addClass('active');
                $(this).find('i').attr('class', 'fa fa-bullseye');
                $(this).parent().css('display', 'block');
                $(this).parent().parent().addClass('menu-open active');
                return false;
            }
            else if(href.split('/').length > 1){
                if(path == href.split('/')[3]){
                    $(this).parent().parent().addClass('active');
                    $(this).parent().css('display', 'none');
                }
            }
        });
    });
</script>
</body>
</html>
