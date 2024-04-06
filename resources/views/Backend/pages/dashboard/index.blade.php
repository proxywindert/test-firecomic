@extends('Backend.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section>
            <!-- Donut chart -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>

                    <h3 class="box-title">Donut Chart</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <div id="donut-chart-1" style="height: 150px;"></div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                        <div id="donut-chart-2" style="height: 150px;"></div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                        <div id="donut-chart-3" style="height: 150px;"></div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                        <div id="donut-chart-4" style="height: 150px;"></div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <div id="donut-chart-5" style="height: 150px;"></div>
                    </div>
                </div>
                <!-- /.box-body-->
            </div>
        </section>
        <!-- /.content -->

        <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <section>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <!-- BAR CHART -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Gender Chart</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="barChart" style="height:230px"></canvas>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-bar-chart-o"></i>

                            <h3 class="box-title">Resource Chart</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="bar-chart" style="height: 235px;"></div>
                        </div>
                        <!-- /.box-body-->
                    </div>
                    <!-- /.box -->

                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Project Chart</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="barChart-project" style="height:230px"></canvas>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Total Cost Chart</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="barChart-cost" style="height:230px"></canvas>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row" style="text-align: center;">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-bar-chart-o"></i>

                            <h3 class="box-title">Recruitment Chart</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="bar-chart-recruitment" style="height: 300px;"></div>
                        </div>
                        <!-- /.box-body-->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>
    <!-- Bootstrap 3.3.7 -->
@endsection

