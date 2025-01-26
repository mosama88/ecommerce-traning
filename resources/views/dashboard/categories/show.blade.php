@extends('dashboard.layouts.layouts')
@section('title', 'Category Create')
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
        <div class="col-md-8 mx-auto">
            <!-- general form elements -->
            <div class="card card-secondary">
                <div class="card-header">
                    @if (App::getlocale() == 'en')
                        <h6 class="">{{ __('category.add_discount_for') }} <span
                                class="text-dark">({{ $category->getTranslation('name', 'en') }})</span> </h6>
                    @else
                        <h6 class="">{{ __('category.add_discount_for') }}
                            ({{ $category->getTranslation('name', 'ar') }})</h6>
                    @endif
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('dashboard.add.discount', $category->id) }}">
                    @csrf

                    <div class="card-body">
                        {{-- Minimal --}}
                        <x-adminlte-select2 name="discount_id" class="discount-select2" id="discount-select2">
                            <option value="" selected>-- Choose One --</option>
                            @foreach ($discounts as $discount)
                                <option value="{{ $discount->id }}">{{ $discount->code }} &rarr;
                                    {{ $discount->percentage }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <x-adminlte-button label="{{ __('action.add') }}" type="submit" theme="dark" class="px-5" />
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>

    </div>

@stop

@push('js')
    <script>
        $(document).ready(function() {
            $('.discount-select2').select2({
                placeholder: '-- {{ __('category.selectd_discount') }} --',

            });
        });
    </script>
@endpush
