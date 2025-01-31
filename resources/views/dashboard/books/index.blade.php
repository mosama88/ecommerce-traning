@extends('dashboard.layouts.layouts')
@section('title', 'Book')
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
        <a href="{{ route('dashboard.books.create') }}" type="button"
            class="btn btn-success btn-md mx-4">{{ __('action.create') }} <i class="fas fa-plus-square"></i></a>
    </div>
    </div>

@stop

@section('content')
    <div>
        <div class="btn-group mb-3">
            <x-delete-select-all model="Publisher" />
            <x-export-excel model="Publisher" />
            <x-import-excel model="Publisher" />
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Books Of Numbers</th>
                                <th>{{ $books }}</th>
                            </tr>
                        </thead>
                    </table>

                    @include('dashboard.books.partials.filter')
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
                                        <th>{{ __('books.books_image') }}</th>
                                        <th>{{ __('books.books_name') }}</th>
                                        <th>{{ __('books.books_description') }}</th>
                                        <th>{{ __('books.books_quantity') }}</th>
                                        <th>{{ __('books.books_publish_year') }}</th>
                                        <th>{{ __('books.books_price') }}</th>
                                        <th>{{ __('books.books_is_available') }}</th>
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
                                        @foreach ($data as $book)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                                <td><input type="checkbox" class="row-checkbox"
                                                        value="{{ $book->id }}">
                                                </td>
                                                <td>{{ $i }}</td>
                                                <td>
                                                    @if ($book->getFirstMediaUrl('image', 'preview'))
                                                        <img src="{{ $book->getFirstMediaUrl('image', 'preview') }}"
                                                            alt="Thumbnail"
                                                            style="width: 200px; height: 100px; object-fit: contain;">
                                                    @else
                                                        <img src="{{ asset('dashboard') }}/default_book.png"
                                                            alt="Thumbnail"
                                                            style="width: 200px; height: 100px; object-fit: contain;">
                                                    @endif
                                                </td>
                                                <td>{{ Str::limit($book->name, 20) }}</td>
                                                <td>{{ Str::limit($book->description, 20) }}</td>
                                                <td>{{ $book->quantity }}</td>
                                                <td>{{ $book->publish_year }}</td>
                                                <td>{{ $book->price }} {{ __('books.le') }}</td>
                                                <td>{{ $book->is_available }}</td>
                                                <td>{{ $book->created_at }}</td>
                                                <td>{{ $book->updated_at }}</td>
                                                {{-- <td>{{ $book->getActiveDiscountValue() }}</td> --}}
                                                <td>
                                                    @include('dashboard.partials.actions', [
                                                        'name' => 'books',
                                                        'name_id' => $book->id,
                                                    ])
                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                @else
                                    <div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
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
    </div>


@stop
@push('js')
    <script>
        $(document).ready(function() {
            $('.discount-select2').select2({
                // placeholder: '-- {{ __('category.selectd_discount') }} --',

            });
        });
    </script>
@endpush
