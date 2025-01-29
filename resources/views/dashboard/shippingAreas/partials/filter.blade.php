  <form action="{{ route('dashboard.shippingAreas.index') }}" method="GET">
      <div class="card-header">
          <div class="row">


              <x-adminlte-input name="shippingAreas_name" fgroup-class="col-md-6"
                  value="{{ request('shippingAreas_name') }}" type="text"
                  label="{{ __('shippingAreas.shippingAreas_name_placeholder') }}"
                  placeholder="ex:shippingAreas Name...." />



              <x-adminlte-input name="shippingAreas_fee" fgroup-class="col-md-6"
                  value="{{ request('shippingAreas_fee') }}" type="text"
                  label="{{ __('shippingAreas.fee_placeholder') }}" placeholder="ex:shippingAreas Fee...." />

          </div>
          @include('dashboard.partials.filter-actions')

      </div>
  </form>
