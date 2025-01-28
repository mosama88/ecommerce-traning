  <form action="{{ route('dashboard.flash_sales.index') }}" method="GET">
      <div class="card-header">
          <div>


              <div class="row">
                  {{-- Name  --}}
                  <x-adminlte-input name="name_flash" fgroup-class="col-md-4" value="{{ request('name_flash') }}"
                      type="text" label="{{ __('flash_sales.name') }}"
                      placeholder="ex:{{ __('flash_sales.name_place_holder') }}...." />

                  {{-- Date --}}
                  @php
                      $config = ['format' => 'YYYY-MM-DD'];
                  @endphp
                  <x-adminlte-input-date label="{{ __('flash_sales.date') }}" name="date_flash"
                      value="{{ request('date_flash') }}" :config="$config"
                      placeholder="ex:{{ __('flash_sales.date_place_holder') }}...." fgroup-class="col-md-4">
                      <x-slot name="appendSlot">
                          <div class="input-group-text bg-gradient-dark">
                              <i class="fas fa-calendar-alt"></i>
                          </div>
                      </x-slot>
                  </x-adminlte-input-date>

                  {{-- start_time --}}
                  @php
                      $configStart_time = ['format' => 'HH:mm:ss']; // Ensures the format is HH:mm
                  @endphp
                  <x-adminlte-input-date name="start_time_flash" :config="$configStart_time"
                      label="{{ __('flash_sales.start_time') }}" value="{{ request('start_time_flash', '00:00:00') }}"
                      placeholder="ex:{{ __('flash_sales.start_time_place_holder') }}...." fgroup-class="col-md-4">
                      <x-slot name="prependSlot">
                          <div class="input-group-text bg-gradient-info">
                              <i class="fas fa-clock"></i>
                          </div>
                      </x-slot>
                  </x-adminlte-input-date>

                  {{-- Time --}}
                  <x-adminlte-input name="time_flash" fgroup-class="col-md-4"
                      oninput="this.value=this.value.replace(/[^0-9.]/g,'');" value="{{ request('time_flash') }}"
                      type="text" label="{{ __('flash_sales.time') }}"
                      placeholder="ex:{{ __('flash_sales.time_place_holder') }}...." />

                  {{-- percentage --}}
                  <x-adminlte-input name="percentage_flash" fgroup-class="col-md-4"
                      oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                      value="{{ request('percentage_flash') }}" type="text"
                      label="{{ __('flash_sales.percentage') }}"
                      placeholder="ex:{{ __('flash_sales.percentage_place_holder') }}...." />

                  {{-- Is Active --}}
                  <x-adminlte-select name="is_active_flash" fgroup-class="col-md-4"
                      label="{{ __('flash_sales.is_active') }}">
                      <option selected>-- {{ __('flash_sales.is_active_choose') }}
                          --
                      </option>
                      <option value="1">
                          {{ __('flash_sales.is_active_yes') }}</option>
                      <option value="0">
                          {{ __('flash_sales.is_active_no') }}</option>
                  </x-adminlte-select>
              </div>


          </div>
          @include('dashboard.partials.filter-actions')

      </div>
  </form>
