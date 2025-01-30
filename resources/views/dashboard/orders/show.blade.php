@extends('dashboard.layouts.layouts')
@section('title', 'Order Show')
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
                    <h3 class="card-title"> {{ __('order.order_show') }}</h3>
                </div>


                <div class="card-body">

                    <div class="row">
                        {{-- Order Number --}}
                        <x-adminlte-input disabled name="number" label="{{ __('order.number') }}"
                            value="{{ old('number', $order['number']) }}" type="text" placeholder="ex: TxRef.******"
                            fgroup-class="col-md-4" />


                        {{-- Transaction Reference --}}
                        <x-adminlte-input disabled name="transaction_reference"
                            label="{{ __('order.transaction_reference') }}"
                            value="{{ old('transaction_reference', $order['transaction_reference']) }}" type="text"
                            placeholder="ex: TxRef.******" fgroup-class="col-md-4" />


                        {{-- Shipping Fee --}}
                        <x-adminlte-input disabled name="shipping_fee" label="{{ __('order.shipping_fee') }}"
                            value="{{ old('shipping_fee', $order['shipping_fee']) }}" type="text" placeholder="ex: 10.10"
                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-4" />


                        {{-- Books Total --}}
                        <x-adminlte-input disabled name="books_total" label="{{ __('order.books_total') }}"
                            value="{{ old('books_total', $order['books_total']) }}" type="text" placeholder="ex: 10.10"
                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-6" />

                        {{-- Total --}}
                        <x-adminlte-input disabled name="total" label="{{ __('order.total') }}"
                            value="{{ old('total', $order['total']) }}" type="text" placeholder="ex: 10.10"
                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-6" />

                        {{-- Status --}}
                        <x-adminlte-input disabled name="status" label="{{ __('order.status') }}"
                            value="{{ old('status', $order->status) }}" type="text" placeholder="ex: 10.10"
                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-6" />
                        {{-- Payment Status --}}
                        <x-adminlte-input disabled name="payment_status" label="{{ __('order.payment_status') }}"
                            value="{{ old('payment_status', $order->payment_status) }}" type="text"
                            placeholder="ex: 10.10" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                            fgroup-class="col-md-6" />


                        {{-- Payment Type --}}
                        <x-adminlte-input disabled name="payment_type" label="{{ __('order.payment_type') }}"
                            value="{{ old('payment_type', $order->payment_type) }}" type="text" placeholder="ex: 10.10"
                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-6" />


                        {{-- Tax Amount --}}
                        <x-adminlte-input disabled name="tax_amount" label="{{ __('order.tax_amount') }}"
                            value="{{ old('tax_amount', $order['tax_amount']) }}" type="text" placeholder="ex: 10.10"
                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-6" />

                        {{-- Address --}}
                        <x-adminlte-input disabled name="address" label="{{ __('order.address') }}"
                            value="{{ old('address', $order['address']) }}" type="text"
                            placeholder="ex: 350 E Broad St...." fgroup-class="col-md-12" />

                        {{-- Shipping Area  --}}
                        <x-adminlte-input disabled name="shipping_area_id" label="{{ __('order.shipping_area_id') }}"
                            value="{{ old('shipping_area_id', $order->shippingArea->name) }}" type="text"
                            placeholder="ex: 10.10" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                            fgroup-class="col-md-6" />

                        {{-- User  --}}
                        <x-adminlte-input disabled name="user_id" label="{{ __('order.user_id') }}"
                            value="{{ old('user_id', $order->user->name) }}" type="text" placeholder="ex: 10.10"
                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" fgroup-class="col-md-6" />
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-center">


                            <a href="{{ route('dashboard.discounts.index') }}" class="btn  btn-secondary btn-flat"><i
                                    class="fas fa-backward mx-1"></i> {{ __('action.back') }} </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
@push('js')
@endpush
