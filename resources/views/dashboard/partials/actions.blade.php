<div class="btn-group">
    <button type="button" class="btn btn-info">{{ __('action.actions') }}</button>
    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
        <span class="sr-only">{{ __('action.actions') }}</span>
    </button>
    <div class="dropdown-menu" role="menu" style="">
        <a class="dropdown-item text-info" href="{{ route('dashboard.' . $name . '.edit', $name_id) }}"><i
                class="fas fa-edit mx-1"></i>
            {{ __('action.edit') }}</a>
        <a class="dropdown-item text-primary" href="{{ route('dashboard.' . $name . '.show', $name_id) }}"><i
                class="fas fa-eye mx-1"></i>
            {{ __('action.show') }}</a>
        <div class="dropdown-divider"></div>
        <form id="delete-form-{{ $name_id }}" action="{{ route('dashboard.' . $name . '.destroy', $name_id) }}"
            method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        <button id="delete_one" data-id="{{ $name_id }}" class="dropdown-item text-danger delete-btn">
            <i class="fas fa-trash-alt mx-1"></i>
            {{ __('action.delete') }}
        </button>

    </div>
</div>

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // إضافة مستمع للنقر على أزرار الحذف
            document.querySelectorAll('.delete-btn').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // منع تقديم النموذج بشكل افتراضي
                    const nameId = this.getAttribute('data-id');
                    const form = document.getElementById(`delete-form-${nameId}`);

                    Swal.fire({
                        title: "{{ __('action.are_you_sure') }}",
                        text: "{{ __('action.you_are_about_to_delete_selected_items') }}",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: "{{ __('action.delete_them') }}",
                        cancelButtonText: "{{ __('action.no_cancel') }}",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // تقديم النموذج بعد تأكيد الحذف
                        }
                    });
                });
            });
        });
    </script>
@endpush
