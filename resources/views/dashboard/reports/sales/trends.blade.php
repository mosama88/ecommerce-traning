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
                    <h1>Hello Trends</h1>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


@stop
