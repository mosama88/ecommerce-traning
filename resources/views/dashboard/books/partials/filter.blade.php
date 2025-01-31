  <form action="{{ route('dashboard.books.index') }}" method="GET">
      <div class="card-header">
          <div class="row col-12">
              <x-adminlte-input name="publisher_name" fgroup-class="col-md-4" value="{{ request('books_name') }}"
                  type="text" label="{{ __('books.books_name') }}" placeholder="ex:books Name...." />
              {{-- books publish year --}}
              @php
                  $config = ['format' => 'YYYY'];
              @endphp
              <x-adminlte-input-date label="{{ __('books.books_publish_year') }}" name="publish_year"
                  value="{{ old('publish_year') }}" :config="$config"
                  placeholder="ex:{{ __('books.books_publish_year_placeholder') }}...." fgroup-class="col-md-4">
                  <x-slot name="appendSlot">
                      <div class="input-group-text bg-gradient-dark">
                          <i class="fas fa-calendar-alt"></i>
                      </div>
                  </x-slot>
              </x-adminlte-input-date>


              {{-- books rate --}}
              <x-adminlte-input name="rate" value="{{ old('rate') }}"
                  oninput="this.value=this.value.replace(/[^0-9.]/g,'');" max=5 label="{{ __('books.books_rate') }}"
                  placeholder="ex:{{ __('books.books_books_rate_placeholder') }}...." fgroup-class="col-md-4" />

              {{-- books price --}}
              <x-adminlte-input name="price" value="{{ old('price') }}"
                  oninput="this.value=this.value.replace(/[^0-9.]/g,'');" label="{{ __('books.books_price') }}"
                  placeholder="ex:{{ __('books.books_price_placeholder') }}...." fgroup-class="col-md-4" />



              {{-- books author_id --}}
              <x-adminlte-select2 fgroup-class="col-md-4" name="author_id" label="{{ __('books.authors_name') }}"
                  class="discount-select2">
                  <option value="" selected>-- {{ __('books.choose_authors_name') }} --</option>
                  @foreach ($other['authors'] as $author)
                      <option @if (old('author_id', $author['author_id']) == $author->id) selected @endif value="{{ $author->id }}">
                          {{ $author->name }}
                      </option>
                  @endforeach
              </x-adminlte-select2>

              {{-- books category_id --}}
              <x-adminlte-select2 fgroup-class="col-md-4" name="category_id" label="{{ __('books.categories_name') }}"
                  class="discount-select2">
                  <option value="" selected>-- {{ __('books.choose_categories_name') }} --</option>
                  @foreach ($other['categories'] as $category)
                      <option @if (old('category_id', $category['category_id']) == $category->id) selected @endif value="{{ $category->id }}">
                          {{ $category->name }}
                      </option>
                  @endforeach
              </x-adminlte-select2>

              {{-- books publisher_id --}}
              <x-adminlte-select2 fgroup-class="col-md-4" name="publisher_id" label="{{ __('books.publishers_name') }}"
                  class="discount-select2">
                  <option value="" selected>-- {{ __('books.choose_publishers_name') }} --</option>
                  @foreach ($other['publishers'] as $publisher)
                      <option @if (old('publisher_id', $publisher['publisher_id']) == $publisher->id) selected @endif value="{{ $publisher->id }}">
                          {{ $publisher->name }}
                      </option>
                  @endforeach
              </x-adminlte-select2>

              {{-- books is_available --}}
              <div class="custom-control  text-right custom-checkbox my-5 mx-2 col-md-4">
                  <input class="custom-control-input" type="checkbox" name="is_available" id="is_available"
                      value="1">
                  <label for="is_available" class="custom-control-label">Is Available</label>
              </div>
              
          </div>



          @include('dashboard.partials.filter-actions')

      </div>
  </form>
