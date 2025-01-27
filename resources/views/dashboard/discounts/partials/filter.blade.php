  <form action="{{ route('dashboard.discounts.index') }}" method="GET">
      <div class="card-header">
          <div class="row">
              <x-adminlte-input name="discount_code" fgroup-class="col-md-4" value="{{ request('discount_code') }}"
                  type="text" label="{{ __('discount.discount_code') }}"
                  placeholder="ex:{{ __('discount.discount_code_placeholder') }}...." />

              <x-adminlte-input name="discount_quantity" fgroup-class="col-md-4"
                  value="{{ request('discount_quantity') }}" type="text"
                  label="{{ __('discount.discount_quantity') }}"
                  placeholder="ex:{{ __('discount.quantity_placeholder') }}...." />

              {{-- Placeholder, date only and append icon --}}
              @php
                  $config = ['format' => 'L'];
              @endphp
              <x-adminlte-input-date label="{{ __('discount.discount_expiry_date') }}" name="discount_expiry_date"
                  value="{{ request('discount_expiry_date') }}" :config="$config"
                  placeholder="ex:{{ __('discount.expiry_date_placeholder') }}...." fgroup-class="col-md-4">
                  <x-slot name="appendSlot">
                      <div class="input-group-text bg-gradient-dark">
                          <i class="fas fa-calendar-alt"></i>
                      </div>
                  </x-slot>
              </x-adminlte-input-date>

          </div>
          @include('dashboard.partials.filter-actions')

      </div>
  </form>


  @push('js')
      <script>
          $(function() {
              $('input[name="discount_expiry_date"]').daterangepicker({
                  opens: 'left'
              }, function(start, end, label) {
                  console.log("A new date selection was made: " + start.format('MM-DD-YYYY') + ' to ' + end
                      .format('MM-DD-YYYY'));
              });
          });
      </script>
  @endpush
