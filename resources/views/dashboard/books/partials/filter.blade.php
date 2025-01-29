  <form action="{{ route('dashboard.books.index') }}" method="GET">
      <div class="card-header">
          <div>
              <x-adminlte-input name="publisher_name" fgroup-class="col-md-3" value="{{ request('books_name') }}"
                  type="text" label="{{ __('books.books_name') }}" placeholder="ex:books Name...." />
          </div>
          @include('dashboard.partials.filter-actions')

      </div>
  </form>
