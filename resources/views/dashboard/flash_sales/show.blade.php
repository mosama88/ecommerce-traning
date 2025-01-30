@extends('dashboard.layouts.layouts')
@section('title', 'Flash Sale Show')
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
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title"> {{ __('flash_sales.flash_sales_create') }}</h3>
                </div>


                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                            href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                            aria-selected="true">{{ __('manu.english') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                            href="#custom-tabs-one-profile" role="tab"
                                            aria-controls="custom-tabs-one-profile"
                                            aria-selected="false">{{ __('manu.arabic') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-home-tab">
                                        {{-- Name English --}}
                                        <x-adminlte-input disabled name="name[en]" fgroup-class="col-md-12"
                                            value="{{ old('name[en]', $flash_sale->getTranslation('name', 'en')) }}"
                                            type="text" label="{{ __('flash_sales.name') }} (English)"
                                            placeholder="ex:{{ __('flash_sales.name_place_holder') }}...." />

                                        {{-- description English --}}
                                        <x-adminlte-textarea disabled label="{{ __('flash_sales.description') }} (English)"
                                            name="description[en]" fgroup-class="col-md-12"
                                            placeholder="{{ __('flash_sales.description_place_holder') }}....">
                                            {{ old('description[en]', $flash_sale->getTranslation('description', 'en')) }}
                                        </x-adminlte-textarea>


                                        <div class="row">
                                            {{-- Date --}}
                                            @php
                                                $config = ['format' => 'YYYY-MM-DD'];
                                            @endphp
                                            <x-adminlte-input-date disabled label="{{ __('flash_sales.date') }}" name="date"
                                                value="{{ old('date', $flash_sale->date) }}" :config="$config"
                                                placeholder="ex:{{ __('flash_sales.date_place_holder') }}...."
                                                fgroup-class="col-md-6">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input-date>

                                            {{-- start_time --}}
                                            @php
                                                $configStart_time = ['format' => 'HH:mm:ss']; // Ensures the format is HH:mm
                                            @endphp
                                            <x-adminlte-input-date disabled name="start_time" :config="$configStart_time"
                                                label="{{ __('flash_sales.start_time') }}"
                                                value="{{ old('start_time', $flash_sale->start_time) }}"
                                                placeholder="ex:{{ __('flash_sales.start_time_place_holder') }}...."
                                                fgroup-class="col-md-6">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text bg-gradient-info">
                                                        <i class="fas fa-clock"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input-date>

                                            {{-- Time --}}
                                            <x-adminlte-input disabled name="time" fgroup-class="col-md-6"
                                                oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                                value="{{ old('time', $flash_sale->time) }}" type="text"
                                                label="{{ __('flash_sales.time') }}"
                                                placeholder="ex:{{ __('flash_sales.time_place_holder') }}...." />
                                            {{-- percentage --}}
                                            <x-adminlte-input disabled name="percentage" fgroup-class="col-md-6"
                                                oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                                value="{{ old('percentage', $flash_sale->percentage) }}" type="text"
                                                label="{{ __('flash_sales.percentage') }}"
                                                placeholder="ex:{{ __('flash_sales.percentage_place_holder') }}...." />

                                            {{-- Is Active --}}
                                            <x-adminlte-select disabled name="is_active" fgroup-class="col-md-6"
                                                label="{{ __('flash_sales.is_active') }}">
                                                <option selected disabled>-- {{ __('flash_sales.is_active_choose') }}
                                                    --
                                                </option>
                                                <option @if (old('is_active', $flash_sale->is_active) == 1) selected @endif value="1">
                                                    {{ __('flash_sales.is_active_yes') }}</option>
                                                <option @if (old('is_active', $flash_sale->is_active) == 0) selected @endif value="0">
                                                    {{ __('flash_sales.is_active_no') }}</option>
                                            </x-adminlte-select>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-profile-tab">
                                        {{-- Name Arabic --}}
                                        <x-adminlte-input disabled name="name[ar]" fgroup-class="col-md-12"
                                            value="{{ old('name[ar]', $flash_sale->getTranslation('name', 'ar')) }}"
                                            type="text" label="{{ __('flash_sales.name') }} (عربى)"
                                            placeholder="{{ __('flash_sales.name_place_holder') }}...." />

                                        {{-- description Arabic --}}
                                        <x-adminlte-textarea disabled label="{{ __('flash_sales.description') }} (عربى)"
                                            name="description[ar]" fgroup-class="col-md-12"
                                            placeholder="{{ __('flash_sales.description_place_holder') }}....">
                                            {{ old('description[ar]', $flash_sale->getTranslation('description', 'ar')) }}
                                        </x-adminlte-textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12 text-center">


                                        <a href="{{ route('dashboard.flash_sales.index') }}"
                                            class="btn  btn-secondary btn-flat"><i class="fas fa-backward mx-1"></i>
                                            {{ __('action.back') }} </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@stop
@push('js')
@endpush
