@extends('dashboard.layouts.layouts')
@section('title', 'Order')
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
        <a href="{{ route('dashboard.flash_sales.create') }}" type="button"
            class="btn btn-success btn-md mx-4">{{ __('action.create') }} <i class="fas fa-plus-square"></i></a>
    </div>
    </div>

@stop

@section('content')
    <div>
        <div class="btn-group mb-3">
            <x-delete-select-all model="Order" />
            <x-export-excel model="Order" />
            <x-import-excel model="Order" />
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                @include('dashboard.orders.partials.filter')
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
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

                                    <th>{{ __('order.number') }}</th>
                                    <th>{{ __('order.books_total') }}</th>
                                    <th>{{ __('order.status') }}</th>
                                    <th>{{ __('order.address') }}</th>
                                    <th>{{ __('order.user_id') }}</th>
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
                                    @foreach ($data as $order)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td><input type="checkbox" class="row-checkbox" value="{{ $order->id }}">
                                            </td>
                                            <td>{{ $i }}</td>
                                            <td> {{ $order->number }}</td>
                                            <td> {{ $order->books_total }}</td>
                                            <td> {{ $order->status }}</td>
                                            <td> {{ Str::limit($order->address, 20) }}</td>
                                            <td> {{ $order->user->name }}</td>
                                            <td> {{ $order->created_at }}</td>
                                            <td> {{ $order->updated_at }}</td>
                                            <td>
                                                @include('dashboard.partials.actions', [
                                                    'name' => 'orders',
                                                    'name_id' => $order->id,
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
                    </div>
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
@push('js')
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                timer: 3000,
                showConfirmButton: false
            });
        @endif
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ session('error') }}",
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>
@endpush
