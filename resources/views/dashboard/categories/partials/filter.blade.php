  <form action="{{ route('dashboard.categories.index') }}" method="GET">
      <div class="card-header">
          <div>
              <x-adminlte-input name="category_name" fgroup-class="col-md-3" value="{{ request('category_name') }}"
                  type="text" label="{{ __('category.category_name') }}" placeholder="ex:Category Name...." />

                  
                  <div class="form-check mx-2">
                      
                      <input class="form-check-input" type="checkbox" name="discount" value="1"
                      @if (request('discount')) checked @endif id="discount">

                      <label class="form-check-label" for="flexCheckChecked">
                          {{ __('category.has_discount') }}
                        </label>
                        
                    </div>
                </div>
                @include('dashboard.partials.filter-actions')
        
      </div>
  </form>

