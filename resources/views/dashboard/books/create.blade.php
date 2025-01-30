@extends('dashboard.layouts.layouts')
@section('title', 'Book Create')
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
                    <h3 class="card-title"> {{ __('books.books_create') }}</h3>
                </div>

                <form action="{{ route('dashboard.books.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            {{-- books name --}}
                            <x-adminlte-input name="name" value="{{ old('name') }}"
                                label="{{ __('books.books_name') }}"
                                placeholder="ex:{{ __('books.books_name_placeholder') }}...." fgroup-class="col-md-4" />

                            {{-- books slug --}}
                            <x-adminlte-input name="slug" value="{{ old('slug') }}"
                                label="{{ __('books.books_slug') }}"
                                placeholder="ex:{{ __('books.books_slug_placeholder') }}...." fgroup-class="col-md-4" />

                            {{-- books price --}}
                            <x-adminlte-input name="price" value="{{ old('price') }}"
                                oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                label="{{ __('books.books_price') }}"
                                placeholder="ex:{{ __('books.books_price_placeholder') }}...." fgroup-class="col-md-4" />

                            {{-- books quantatity --}}
                            <x-adminlte-input name="quantity" value="{{ old('quantity') }}"
                                oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                label="{{ __('books.books_quantity') }}"
                                placeholder="ex:{{ __('books.books_quantity_placeholder') }}...."
                                fgroup-class="col-md-4" />


                            {{-- books rate --}}
                            <x-adminlte-input name="rate" value="{{ old('rate') }}"
                                oninput="this.value=this.value.replace(/[^0-9.]/g,'');" max=5
                                label="{{ __('books.books_rate') }}"
                                placeholder="ex:{{ __('books.books_books_rate_placeholder') }}...."
                                fgroup-class="col-md-4" />

                            {{-- books publish year --}}
                            @php
                                $config = ['format' => 'YYYY'];
                            @endphp
                            <x-adminlte-input-date label="{{ __('books.books_publish_year') }}" name="publish_year"
                                value="{{ old('publish_year') }}" :config="$config"
                                placeholder="ex:{{ __('books.books_publish_year_placeholder') }}...."
                                fgroup-class="col-md-4">
                                <x-slot name="appendSlot">
                                    <div class="input-group-text bg-gradient-dark">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input-date>

                            {{-- books description --}}
                            <x-adminlte-textarea label="{{ __('books.books_description') }}" name="description[en]"
                                fgroup-class="col-md-12" placeholder="{{ __('books.books_description_placeholder') }}....">
                                {{ old('description[en]') }}
                            </x-adminlte-textarea>


                            <x-adminlte-select2 fgroup-class="col-md-4" name="author_id"
                                label="{{ __('books.authors_name') }}" class="discount-select2">
                                <option value="" selected>-- {{ __('books.choose_authors_name') }} --</option>
                                @foreach ($other['authors'] as $author)
                                    <option @if (old('author_id', $author['author_id']) == $author->id) selected @endif value="{{ $author->id }}">
                                        {{ $author->name }}
                                    </option>
                                @endforeach
                            </x-adminlte-select2>


                            <x-adminlte-select2 fgroup-class="col-md-4" name="category_id"
                                label="{{ __('books.categories_name') }}" class="discount-select2">
                                <option value="" selected>-- {{ __('books.choose_categories_name') }} --</option>
                                @foreach ($other['categories'] as $category)
                                    <option @if (old('category_id', $category['category_id']) == $category->id) selected @endif value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </x-adminlte-select2>


                            <x-adminlte-select2 fgroup-class="col-md-4" name="publisher_id"
                                label="{{ __('books.publishers_name') }}" class="discount-select2">
                                <option value="" selected>-- {{ __('books.choose_publishers_name') }} --</option>
                                @foreach ($other['publishers'] as $publisher)
                                    <option @if (old('publisher_id', $publisher['publisher_id']) == $publisher->id) selected @endif value="{{ $publisher->id }}">
                                        {{ $publisher->name }}
                                    </option>
                                @endforeach
                            </x-adminlte-select2>


                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 text-center">
                                <x-adminlte-button type="submit" label="{{ __('action.save') }}" theme="primary"
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
        $(document).ready(function() {
            $('.discount-select2').select2({
                // placeholder: '-- {{ __('category.selectd_discount') }} --',

            });
        });
    </script>
@endpush
