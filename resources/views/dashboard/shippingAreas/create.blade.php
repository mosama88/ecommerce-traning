@extends('dashboard.layouts.layouts')
@section('title', 'Shipping Area Create')
@section('content_header')
    <div class="row d-flex flex-row mb-3">
        <div class="col-sm-6">
            <ol class="breadcrumb">
                <x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
            </ol>
        </div>

        @if (app()->getLocale() == 'ar')
            <div class="col-6 text-end">
            @else
                <div class="col-6 text-right">
        @endif

    </div>
    </div>
@stop

@section('content')

    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"> {{ __('shippingAreas.shippingAreas_create') }}</h3>
                </div>

                <form action="{{ route('dashboard.shippingAreas.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            {{-- shippingAreas name --}}
                            <x-adminlte-input name="name" value="{{ old('name') }}"
                                label="{{ __('shippingAreas.shippingAreas_name') }}"
                                placeholder="ex:{{ __('shippingAreas.shippingAreas_name_placeholder') }}...."
                                fgroup-class="col-md-6" />

                            {{-- shippingAreas fee --}}
                            <x-adminlte-input name="fee" value="{{ old('fee') }}"
                                oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                label="{{ __('shippingAreas.shippingAreas_fee') }}"
                                placeholder="ex:{{ __('shippingAreas.fee_placeholder') }}...." fgroup-class="col-md-6" />
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 text-center">
                                <x-adminlte-button type="submit" label="{{ __('action.save') }}" theme="primary"
                                    icon="fas fa-save mx-1" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@stop
@push('js')
@endpush
