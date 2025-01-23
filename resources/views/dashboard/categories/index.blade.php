@extends('dashboard.layouts.layouts')
@section('title', 'Category')
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
        <a href="{{ route('dashboard.categories.create') }}" type="button"
            class="btn btn-success btn-md mx-4">{{ __('action.create') }} <i class="fas fa-plus-square"></i></a>
    </div>
    </div>

@stop

@section('content')
    <div>
        <div class="btn-group mb-3">
            <button type="button" class="btn btn-danger mx-1">{{ __('action.delete_all') }} <i
                    class="fas fa-trash-restore-alt mx-1"></i></button>
            <button type="button" class="btn btn-success mx-1">{{ __('action.export_excel') }} <i
                    class="fas fa-file-excel mx-1"></i></button>
            <button type="button" class="btn btn-success mx-1">{{ __('action.import_excel') }} <i
                    class="fas fa-file-excel mx-1"></i></button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <x-adminlte-input name="name_search" fgroup-class="col-md-3" value="{{ request('name_search') }}"
                            type="text" label="{{ __('category.category_name') }}" placeholder="ex:Category Name...." />

                        <div class="form-check mx-2">
                            <input class="form-check-input" name="discount_search" type="checkbox" value=""
                                id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                {{ __('category.has_discount') }}
                            </label>

                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-7 text-center">
                            <button type="button" class="btn btn-primary mx-1">{{ __('action.filter') }} <i
                                    class="fas fa-filter mx-1"></i></button>
                            <button type="button" class="btn btn-secondary mx-1">{{ __('action.reset') }}</button>
                        </div>
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th class="col-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            {{ __('action.select_all') }}
                                        </label>
                                    </div>
                                </th>
                                <th>#</th>
                                <th>{{ __('category.category_name') }}</th>
                                <th>{{ __('category.discount') }}</th>
                                <th>{{ __('action.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($data) && isset($data))
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($data as $category)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-1" type="checkbox" value=""
                                                id="flexCheckChecked">
                                        </td>
                                        <td>{{ $i }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->discount?->name }}</td>
                                        <td>
                                            @include('dashboard.partials.actions', [
                                                'name' => 'categories',
                                                'name_id' => $category->id,
                                            ])
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-exclamation-triangle"></i> {{ __('action.alert') }}!</h5>
                                    {{ __('action.check_data_get') }}
                                </div>
                            @endif

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@stop
