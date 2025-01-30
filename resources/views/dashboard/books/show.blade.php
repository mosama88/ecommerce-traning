@extends('dashboard.layouts.layouts')
@section('title', 'Book Show')
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
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger text-center">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title"> {{ __('books.books_create') }}</h3>
                </div>


                <div class="card-body">
                    <div class="row">
                        {{-- books name --}}
                        <x-adminlte-input disabled name="name" value="{{ old('name', $book->name) }}"
                            label="{{ __('books.books_name') }}"
                            placeholder="ex:{{ __('books.books_name_placeholder') }}...." fgroup-class="col-md-4" />

                        {{-- books slug --}}
                        <x-adminlte-input disabled name="slug" value="{{ old('slug', $book->slug) }}"
                            label="{{ __('books.books_slug') }}"
                            placeholder="ex:{{ __('books.books_slug_placeholder') }}...." fgroup-class="col-md-4" />

                        {{-- books price --}}
                        <x-adminlte-input disabled name="price" value="{{ old('price', $book->price) }}"
                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" label="{{ __('books.books_price') }}"
                            placeholder="ex:{{ __('books.books_price_placeholder') }}...." fgroup-class="col-md-4" />

                        {{-- books quantatity --}}
                        <x-adminlte-input disabled name="quantity" value="{{ old('quantity', $book->quantity) }}"
                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                            label="{{ __('books.books_quantity') }}"
                            placeholder="ex:{{ __('books.books_quantity_placeholder') }}...." fgroup-class="col-md-4" />


                        {{-- books rate --}}
                        <x-adminlte-input disabled name="rate" value="{{ old('rate', $book->rate) }}"
                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" max=5
                            label="{{ __('books.books_rate') }}"
                            placeholder="ex:{{ __('books.books_books_rate_placeholder') }}...." fgroup-class="col-md-4" />

                        {{-- books publish year --}}
                        @php
                            $config = ['format' => 'YYYY'];
                        @endphp
                        <x-adminlte-input-date disabled label="{{ __('books.books_publish_year') }}" name="publish_year"
                            value="{{ old('publish_year', $book->publish_year) }}" :config="$config"
                            placeholder="ex:{{ __('books.books_publish_year_placeholder') }}...." fgroup-class="col-md-4">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-gradient-dark">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>

                        {{-- books description --}}
                        <x-adminlte-textarea disabled label="{{ __('books.books_description') }}" name="description"
                            fgroup-class="col-md-12" placeholder="{{ __('books.books_description_placeholder') }}....">
                            {{ old('description', $book->description) }}
                        </x-adminlte-textarea>
                        <div class="row col-12">
                            {{-- books Image --}}

                            @if ($book->getFirstMediaUrl('image', 'preview'))
                                <img src="{{ $book->getFirstMediaUrl('image', 'preview') }}" alt="Thumbnail"
                                    style="width: 200px; height: 100px; object-fit: contain;">
                            @else
                                <img src="{{ asset('dashboard') }}/default_book.png" alt="Thumbnail"
                                    style="width: 200px; height: 100px; object-fit: contain;">
                            @endif
                        </div>


                        {{-- books author_id --}}
                        <x-adminlte-select2 disabled fgroup-class="col-md-4" name="author_id"
                            label="{{ __('books.authors_name') }}" class="discount-select2">
                            <option value="" selected>-- {{ __('books.choose_authors_name') }} --</option>
                            @foreach ($other['authors'] as $author)
                                <option @if (old('author_id', $book->author_id) == $author->id) selected @endif value="{{ $author->id }}">
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>

                        {{-- books category_id --}}
                        <x-adminlte-select2 disabled fgroup-class="col-md-4" name="category_id"
                            label="{{ __('books.categories_name') }}" class="discount-select2">
                            <option value="" selected>-- {{ __('books.choose_categories_name') }} --</option>
                            @foreach ($other['categories'] as $category)
                                <option @if (old('category_id', $book->category_id) == $category->id) selected @endif value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>

                        {{-- books publisher_id --}}
                        <x-adminlte-select2 disabled fgroup-class="col-md-4" name="publisher_id"
                            label="{{ __('books.publishers_name') }}" class="discount-select2">
                            <option value="" selected>-- {{ __('books.choose_publishers_name') }} --</option>
                            @foreach ($other['publishers'] as $publisher)
                                <option @if (old('publisher_id', $book->publisher_id) == $publisher->id) selected @endif value="{{ $publisher->id }}">
                                    {{ $publisher->name }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                        <div class="row mx-1">

                            {{-- books is_available --}}
                            <div class="custom-control custom-checkbox mb-3 mx-2">
                                <input disabled class="custom-control-input" type="checkbox" name="is_available"
                                    id="is_available" value="{{ $book->is_available }}">
                                <label for="is_available" class="custom-control-label">Is Available</label>
                            </div>
                        </div>

                        <div class="row mx-1 col-12">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="discount_id" name="customRadio">
                                <label for="discount_id" class="custom-control-label">Discount</label>
                            </div>

                            <div class="custom-control custom-radio mx-2">
                                <input class="custom-control-input" type="radio" id="flash_sale_id" name="customRadio">
                                <label for="flash_sale_id" class="custom-control-label">Flash Sale</label>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-12">
                            <x-adminlte-select2 fgroup-class="col-md-4" name="discountable_id" class="discount-select2">
                                <option></option>
                            </x-adminlte-select2>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-center">


                            <a href="{{ route('dashboard.books.index') }}" class="btn  btn-secondary btn-flat"><i
                                    class="fas fa-backward mx-1"></i>
                                {{ __('action.back') }} </a>
                        </div>
                    </div>
                </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const discountRadio = document.querySelector('#discount_id');
            const flashSaleRadio = document.querySelector('#flash_sale_id');
            const discountDropDown = document.querySelector('.discount-select2');
            const discountUrl = "{{ route('discount.search') }}";
            const flashSaleUrl = "{{ route('flash_sale.search') }}";
            const local = "{{ App::getLocale() }}";

            discountRadio.addEventListener('change', () => showDiscountDropDown(discountUrl,
                '-- Select Discount --'));
            flashSaleRadio.addEventListener('change', () => showDiscountDropDown(flashSaleUrl,
                '-- Select Flash Sale --'));

            function showDiscountDropDown(url, placeholder) {
                discountDropDown.style.display = 'block';
                enableSelect2(url, placeholder);
            }

            function enableSelect2(url, placeholder) {
                $('.discount-select2').select2({
                    placeholder: placeholder,
                    allowClear: true,
                    ajax: {
                        url: url,
                        dataType: 'json',
                        delay: 250,
                        processResults: function(data) {
                            return {
                                results: data.data.discounts.map(discount => ({
                                    id: discount.id,
                                    text: url === discountUrl ?
                                        `${discount.code} - ${discount.percentage}` :
                                        discount.name[local]
                                }))
                            };
                        }
                    }
                });
            }
        });
    </script>
@endpush
