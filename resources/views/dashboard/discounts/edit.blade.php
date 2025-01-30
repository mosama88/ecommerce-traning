@extends('dashboard.layouts.layouts')
@section('title', 'Discount Edit')
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
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"> {{ __('discount.discount_edit') }}</h3>
                </div>

                <form action="{{ route('dashboard.discounts.update', $discount->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="discount_id" value="{{ $discount->id }}">

                    <div class="card-body">
                        <div class="row">
                            {{-- Discount Code --}}
                            <x-adminlte-input name="code" value="{{ old('code', $discount->code) }}"
                                label="{{ __('discount.discount_code') }}"
                                placeholder="ex:{{ __('discount.discount_code_placeholder') }}...."
                                fgroup-class="col-md-4" />


                            <button type="button" style="height:40%;margin-top:3%" class="btn btn-outline-primary"
                                id="generate-code">Generate Code <i class="fas fa-random"></i></button>
                            {{-- Discount Quantity --}}
                            <x-adminlte-input name="quantity" value="{{ old('quantity', $discount->quantity) }}"
                              oninput="this.value=this.value.replace(/[^0-9.]/g,'');"  label="{{ __('discount.discount_quantity') }}"
                                placeholder="ex:{{ __('discount.quantity_placeholder') }}...." fgroup-class="col-md-6" />

                            {{-- Discount Percentage --}}
                            <x-adminlte-input name="percentage" value="{{ old('percentage', $discount->percentage) * 1 }}"
                               oninput="this.value=this.value.replace(/[^0-9.]/g,'');" label="{{ __('discount.discount_percentage') }}"
                                placeholder="ex:{{ __('discount.discount_percentage_placeholder') }}...."
                                fgroup-class="col-md-6" />

                            {{-- Discount Expiry Date --}}
                            @php
                                $config = ['format' => 'YYYY-MM-DD'];
                            @endphp
                            <x-adminlte-input-date label="{{ __('discount.discount_expiry_date') }}" name="expiry_date"
                                value="{{ old('expiry_date', $discount->expiry_date) }}" :config="$config"
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
                                <x-adminlte-button type="submit" label="{{ __('action.update') }}" theme="info"
                                    icon="fas fa-save mx-1" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@stop
@push('js')
    <script>
        const codeElement = document.querySelector('input[name=code]');
        const generateCodeElement = document.querySelector('#generate-code');

        generateCodeElement.addEventListener('click', insertCode);



        async function insertCode() {
            const code = generateDiscountCode();
            const is_exist = await checkCodeAvailable(checkCodeUrl, code);

            if (!is_exist) {
                codeElement.value = code;
            }
        }

        const checkCodeUrl = "{{ route('discount.check.code') }}";
        async function checkCodeAvailable(url, code) {
            const response = await fetch(url);
            const data = await response.json();
            return data.data.is_exist;
        }

        function generateDiscountCode() {
            const prefix = "DISCOUNT";
            const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            let code = prefix;


            for (let i = 0; i < 4; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                code += characters.charAt(randomIndex);
            }
            return code;
        }
    </script>
@endpush
