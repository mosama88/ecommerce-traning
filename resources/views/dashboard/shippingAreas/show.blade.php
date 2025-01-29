@extends('dashboard.layouts.layouts')
@section('title', 'Authors Show')
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
                    <h3 class="card-title"> {{ __('authors.authors_show') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- shippingAreas name --}}
                        <x-adminlte-input disabled name="name" value="{{ old('name', $shippingArea->name) }}"
                            label="{{ __('shippingAreas.shippingAreas_name') }}"
                            placeholder="ex:{{ __('shippingAreas.shippingAreas_name_placeholder') }}...."
                            fgroup-class="col-md-6" />

                        {{-- shippingAreas fee --}}
                        <x-adminlte-input disabled name="fee" value="{{ old('fee', $shippingArea->fee) }}"
                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                            label="{{ __('shippingAreas.shippingAreas_fee') }}"
                            placeholder="ex:{{ __('shippingAreas.fee_placeholder') }}...." fgroup-class="col-md-6" />

                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-center">


                            <a href="{{ route('dashboard.authors.index') }}" class="btn  btn-info btn-flat"><i
                                    class="fas fa-backward mx-1"></i> {{ __('action.back') }} </a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

    </div>

@stop
