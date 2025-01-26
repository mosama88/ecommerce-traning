<button id="delete-selected" class="btn btn-danger" data-model="{{ $model }}" disabled>
    {{ __('action.delete_all') }}
</button>

@push('js')
<script>
    const selectAll = document.getElementById('select-all');

    if (selectAll) {
        const rowCheckboxes = document.querySelectorAll('.row-checkbox');
        rowCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateButtonState);
        });
        handleSelectAllToDelete();
        handleDeleteSelected();
    }

    function handleSelectAllToDelete() {
        selectAll.addEventListener('change', function(event) {
            const checkboxes = document.querySelectorAll('.row-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
            updateButtonState();
        });
    }

    function handleDeleteSelected() {
        const deleteSelected = document.getElementById('delete-selected');
        deleteSelected.addEventListener('click', function(event) {
            const selectedIds = Array.from(document.querySelectorAll('.row-checkbox:checked'))
                .map(checkbox => checkbox.value);

            if (selectedIds.length === 0) {
                Swal.fire("{{ __('action.no_items_selected') }}", "{{ __('action.please_select_at_least_one') }}", 'warning');
                return;
            }

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
                    fetch('/dashboard/delete-items', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                ids: selectedIds,
                                model: deleteSelected.dataset.model
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Deleted!', data.message, 'success').then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire('Error!', data.message, 'error');
                            }
                        })
                        .catch(error => {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                        });
                }
            });
        });
    }

    function updateButtonState() {
        const deleteButton = document.getElementById('delete-selected');
        const anyChecked = document.querySelectorAll('.row-checkbox:checked').length > 0;
        deleteButton.disabled = !anyChecked;
    }
</script>
@endpush

