  <form action="{{ route('dashboard.publishers.index') }}" method="GET">
      <div class="card-header">
          <div>
              <x-adminlte-input name="publisher_name" fgroup-class="col-md-3" value="{{ request('publishers_name') }}"
                  type="text" label="{{ __('publishers.publishers_name') }}" placeholder="ex:publishers Name...." />
          </div>
          @include('dashboard.partials.filter-actions')

      </div>
  </form>
