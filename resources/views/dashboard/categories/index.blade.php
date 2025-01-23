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
            <x-delete-select-all model="Category"></x-delete-select-all>
            <x-export-excel model="Category"></x-export-excel>
            <x-import-excel model="Category"></x-import-excel>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                @include('dashboard.categories.partials.filter')
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th class="col-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="select-all">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            {{ __('action.select_all') }}
                                        </label>
                                    </div>
                                </th>
                                <th>#</th>
                                <th>{{ __('category.category_name_en') }}</th>
                                <th>{{ __('category.category_name_ar') }}</th>
                                <th>{{ __('category.discount') }}</th>
                                <th>{{ __('action.actions') }}</th>
                            </tr>
                        </thead>
                        @if (!empty($data) && isset($data))
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($data as $category)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-1 row-checkbox" value="{{ $category->id }}"
                                                type="checkbox" id="flexCheckChecked">
                                        </td>
                                        <td>{{ $i }}</td>
                                        <td>{{ $category->getTranslation('name', 'en') }}</td>
                                        <td>{{ $category->getTranslation('name', 'ar') }}</td>
                                        <td>{{ $category->discount?->name }}</td>
                                        <td>
                                            @include('dashboard.partials.actions', [
                                                'name' => 'categories',
                                                'name_id' => $category->id,
                                            ])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-exclamation-triangle"></i> {{ __('action.alert') }}!</h5>
                                {{ __('action.check_data_get') }}
                            </div>
                        @endif
                    </table>
                    <div class="mx-2">
                        {{ $data->links() }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop
