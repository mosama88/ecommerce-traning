  <div class="row mb-2">
      <div class="col-7 text-center">
          <button type="submit" class="btn btn-primary mx-1">{{ __('action.filter') }} <i
                  class="fas fa-filter mx-1"></i></button>
          <button type="button" onclick="resetFilters()" class="btn btn-secondary mx-1">{{ __('action.reset') }} <i class="far fa-window-restore mx-1"></i></button>
      </div>
  </div>

  @section('js')
      <script>
          function resetFilters() {
              window.location.href = window.location.pathname;
          }
      </script>
  @stop
