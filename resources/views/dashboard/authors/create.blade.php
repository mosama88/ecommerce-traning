@extends('dashboard.layouts.layouts')
@section('title', 'Author Create')
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
                    <h3 class="card-title"> {{ __('authors.authors_create') }}</h3>
                </div>

                <form action="{{ route('dashboard.authors.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            {{-- authors name --}}
                            <x-adminlte-input name="name" value="{{ old('name') }}"
                                label="{{ __('authors.authors_name') }}"
                                placeholder="ex:{{ __('authors.authors_name_placeholder') }}...." fgroup-class="col-md-4" />
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
