@extends('dashboard.layouts.layouts')
@section('title', 'Category Edit')
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
    <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                    href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                    aria-selected="true">{{ __('manu.english') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile"
                                    aria-selected="false">{{ __('manu.arabic') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                aria-labelledby="custom-tabs-one-home-tab">
                                <x-adminlte-input name="name[en]" fgroup-class="col-md-6"
                                    value="{{ old('name[en]', $category->getTranslation('name', 'en')) }}" type="text"
                                    label="{{ __('category.category_name') }}" placeholder="ex:Category Name...." />

                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                aria-labelledby="custom-tabs-one-profile-tab">
                                <x-adminlte-input name="name[ar]" fgroup-class="col-md-6"
                                    value="{{ old('name[ar]', $category->getTranslation('name', 'ar')) }}" type="text"
                                    label="{{ __('category.category_name') }} (عربى)" placeholder="أسم الفئة" />
                            </div>


                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 text-center">
                                <x-adminlte-button type="submit" label="{{ __('action.update') }}" theme="primary"
                                    icon="fas fa-save mx-1" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

        </div>
    </form>

@stop
