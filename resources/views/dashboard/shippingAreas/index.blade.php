@extends('dashboard.layouts.layouts')
@section('title', 'Shipping Area')
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
        <a href="{{ route('dashboard.shippingAreas.create') }}" type="button"
            class="btn btn-success btn-md mx-4">{{ __('action.create') }} <i class="fas fa-plus-square"></i></a>
    </div>
    </div>

@stop

@section('content')
    <div>
        <div class="btn-group mb-3">
            <x-delete-select-all model="ShippingArea" />
            <x-export-excel model="ShippingArea" />
            <x-import-excel model="ShippingArea" />
        </div>
    </div>
    {{-- {{ dd(session('success')) }} --}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                @include('dashboard.shippingAreas.partials.filter')
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-1">
                                    <div class="form-check">
                                        <input class="form-check-input xl-1" type="checkbox" id="select-all">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            {{ __('action.select_all') }}
                                        </label>
                                    </div>
                                </th>
                                <th>#</th>
                                <th>{{ __('shippingAreas.shippingAreas_name') }}</th>
                                <th>{{ __('shippingAreas.shippingAreas_fee') }}</th>
                                <th>{{ __('action.created_at') }}</th>
                                <th>{{ __('action.updated_at') }}</th>
                                <th>{{ __('action.actions') }}</th>
                            </tr>
                        </thead>
                        @if (!empty($data) && isset($data))
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($data as $shippingArea)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td><input type="checkbox" class="row-checkbox" value="{{ $shippingArea->id }}"></td>
                                        <td>{{ $i }}</td>

                                        <td>{{ $shippingArea->name }}</td>
                                        <td>{{ $shippingArea->fee }}</td>
                                        <td>{{ $shippingArea->created_at }}</td>
                                        <td>{{ $shippingArea->updated_at }}</td>
                                        <td>
                                            @include('dashboard.partials.actions', [
                                                'name' => 'shippingAreas',
                                                'name_id' => $shippingArea->id,
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
                        {{ $data->appends(request()->query())->links() }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


@stop
