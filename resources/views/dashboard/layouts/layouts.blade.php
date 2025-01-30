@extends('adminlte::page')
@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    @if (app()->getLocale() == 'ar')
        <h4 class="mt-4 text-dark">تحميل</h4>
    @else
        <h4 class="mt-4 text-dark">Loading</h4>
    @endif

@stop

@section('css')

    @yield('add-css')
    @if (app()->getLocale() == 'ar')
        {{-- font-family: DroidKufi-Regular; --}}
        <link rel="stylesheet" href="{{ asset('dashboard') }}/fonts_ar/stylesheet.css">
        {{-- RTL --}}
        <link rel="stylesheet" href="{{ asset('dashboard') }}/css/rtl.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    @endif
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />


    {{-- Add here extra stylesheets --}}
    <style>
        .select2-container--default .select2-selection--single {
            height: 40px;
            /* لتحديد ارتفاع الحقل */
            line-height: 40px;
            /* لضبط النص في المنتصف */
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
            /* لضبط السهم */
        }
    </style>
@stop

@push('js')
    <script src="{{ asset('dashboard') }}/js/filepond/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

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
