@extends('dashboard.layouts.layouts')
@section('title', 'Books Report')
@section('content_header')
    <div class="row d-flex flex-row mb-3">
        <div class="col-sm-6">
            <ol class="breadcrumb">
                <x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
            </ol>
        </div>

    </div>


@stop

@section('content')

    {{-- {{ dd(session('success')) }} --}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body p-0">

                    {{-- Here content --}}
                    <h1>Books Reports</h1>


                    <div class="row col-12 my-4 mx-auto">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Total: {{ number_format($dailySales, 2) }}</h3>

                                    <p>Today's Sales</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-basket"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Total: {{ number_format($weeklySales) }}</h3>

                                    <p>This Week's Sales</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar-week"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>Total: {{ number_format($monthSales) }}</h3>

                                    <p>This Month's Sales</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-cart-plus"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>


                    <div class="row col-12 my-4 mx-auto">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ number_format($dailyOrders) }} Orders</h3>

                                    <p>Today's Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-basket"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ number_format($weeklyOrders) }} Orders</h3>

                                    <p>This Week's Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar-week"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ number_format($monthOrders) }} Orders</h3>

                                    <p>This Month's Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-cart-plus"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('dashboard/css/ionicons.min.css') }}">
@endpush
@push('js')
@endpush
