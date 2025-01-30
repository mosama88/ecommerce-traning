@extends('dashboard.layouts.layouts')
@section('title', 'Publisher Edit')
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
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"> {{ __('publishers.publishers_edit') }}</h3>
                </div>

                <form action="{{ route('dashboard.publishers.update', $publisher->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="publishers_id" value="{{ $publisher->id }}">

                    <div class="card-body">
                        <div class="row">
                            {{-- publishers name --}}
                            <x-adminlte-input name="name" value="{{ old('name', $publisher->name) }}"
                                label="{{ __('publishers.publishers_name') }}"
                                placeholder="ex:{{ __('publishers.publishers_name_placeholder') }}...." fgroup-class="col-md-4" />



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
