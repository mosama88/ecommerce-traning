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
            // Attach event listener to delete buttons
            document.querySelectorAll('.delete-btn').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default behavior

                    // Retrieve the form ID from the button's data attribute
                    const nameId = this.getAttribute('data-id');
                    const form = document.getElementById(`delete-form-${nameId}`);

                    // Display SweetAlert confirmation dialog
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
                            // Perform AJAX request
                            fetch(form.action, {
                                    method: 'POST',
                                    body: new FormData(form),
                                    headers: {
                                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // Add CSRF token
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            title: "{{ __('action.deleted') }}",
                                            text: data
                                            .message, // هذه الرسالة تأتي من الـ Controller
                                            icon: 'success',
                                            timer: 1500,
                                            showConfirmButton: false
                                        }).then(() => {
                                            location
                                                .reload(); // Reload the page
                                        });
                                    } else {
                                        Swal.fire({
                                            title: "{{ __('action.error') }}",
                                            text: data.message ||
                                                "{{ __('action.unexpected_error_occurred') }}",
                                            icon: 'error'
                                        });
                                    }
                                })
                                .catch(error => {
                                    Swal.fire({
                                        title: "{{ __('action.error') }}",
                                        text: "{{ __('action.unexpected_error_occurred') }}",
                                        icon: 'error'
                                    });
                                });
                        }
                    });
                });
            });
        });
    </script>
@endpush
