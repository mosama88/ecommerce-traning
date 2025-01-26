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


    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('dashboard') }}/css/rtl.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    @endif

@stop

@section('js')
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
@stop
