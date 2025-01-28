  <form action="{{ route('dashboard.authors.index') }}" method="GET">
      <div class="card-header">
          <div>
              <x-adminlte-input name="author_name" fgroup-class="col-md-3" value="{{ request('author_name') }}"
                  type="text" label="{{ __('author.author_name') }}" placeholder="ex:author Name...." />
          </div>
          @include('dashboard.partials.filter-actions')

      </div>
  </form>
