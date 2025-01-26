  <form action="{{ route('dashboard.categories.index') }}" method="GET">
      <div class="card-header">
          <div>
              <x-adminlte-input name="category_name" fgroup-class="col-md-3" value="{{ request('category_name') }}"
                  type="text" label="{{ __('category.category_name') }}" placeholder="ex:Category Name...." />

              <div class="form-check mx-2">
                  <input class="form-check-input" name="discount_search" type="checkbox" value=""
                      id="flexCheckChecked">
                  <label class="form-check-label" for="flexCheckChecked">
                      {{ __('category.has_discount') }}
                  </label>

              </div>
          </div>
          <div class="row mb-2">
              <div class="col-7 text-center">
                  <button type="submit" class="btn btn-primary mx-1">{{ __('action.filter') }} <i
                          class="fas fa-filter mx-1"></i></button>
                  <button type="button" class="btn btn-secondary mx-1">{{ __('action.reset') }}</button>
              </div>
          </div>

      </div>
  </form>
