@extends('dashboard.layouts.layouts')
@section('title', 'Discount Show')
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
                    <h3 class="card-title"> {{ __('discount.discount_show') }}</h3>
                </div>


                <input type="hidden" name="discount_id" value="{{ $discount->id }}">

                <div class="card-body">
                    <div class="row">
                        {{-- Discount Code --}}
                        <x-adminlte-input disabled name="code" value="{{ old('code', $discount->code) }}"
                            label="{{ __('discount.discount_code') }}"
                            placeholder="ex:{{ __('discount.discount_code_placeholder') }}...." fgroup-class="col-md-6" />

                        {{-- Discount Quantity --}}
                        <x-adminlte-input disabled name="quantity" value="{{ old('quantity', $discount->quantity) }}"
                            label="{{ __('discount.discount_quantity') }}"
                            placeholder="ex:{{ __('discount.quantity_placeholder') }}...." fgroup-class="col-md-6" />

                        {{-- Discount Percentage --}}
                        <x-adminlte-input disabled name="percentage"
                            value="{{ old('percentage', $discount->percentage) * 1 }}"
                            label="{{ __('discount.discount_percentage') }}"
                            placeholder="ex:{{ __('discount.discount_percentage_placeholder') }}...."
                            fgroup-class="col-md-6" />

                        {{-- Discount Expiry Date --}}
                        @php
                            $config = ['format' => 'YYYY-MM-DD'];
                        @endphp
                        <x-adminlte-input-date disabled label="{{ __('discount.discount_expiry_date') }}"
                            name="expiry_date" value="{{ old('expiry_date', $discount->expiry_date) }}" :config="$config"
                            placeholder="ex:{{ __('discount.expiry_date_placeholder') }}...." fgroup-class="col-md-6">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-gradient-dark">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>



                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-center">


                            <a href="{{ route('dashboard.discounts.index') }}" class="btn  btn-info btn-flat"><i
                                    class="fas fa-backward mx-1"></i> {{ __('action.back') }} </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
