<button type="button" class="btn btn-success mx-1" data-toggle="modal" data-target="#import_excel_file">
    {{ __('action.import_excel') }} <i class="fas fa-file-excel mx-1"></i>
</button>


<div class="modal fade" id="import_excel_file" tabindex="-1" role="dialog" aria-labelledby="importExcelModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importExcelModalLabel">Import Excel File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.import.excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="model" value="{{ $model }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Select Excel File</label>
                        <input type="file" name="file" id="file" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- @push('js')
    <script>
        document.getElementById('import_excel_file').addEventListener('click', async () => {
            const {
                value: file
            } = await Swal.fire({
                title: "{{ __('action.choose_file_excel') }}",
                input: "file",
                inputAttributes: {
                    accept: ".xls,.xlsx", // تحديد الملفات المسموح بها
                    "aria-label": "{{ __('action.upload_excel_file') }}"
                },
                confirmButtonText: "{{ __('action.upload') }}", // تغيير النص إلى Upload
                showCancelButton: true, // لإظهار زر إلغاء
                cancelButtonText: "{{ __('action.cancel') }}" // نص زر الإلغاء
            });

            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    Swal.fire({
                        title: "{{ __('action.done_file_upload') }}",
                        text: "{{ __('action.file_name') }}: " + file.name,
                        icon: "success",
                        confirmButtonText: "{{ __('action.done') }}" // نص زر التأكيد في الرسالة الثانية
                    });
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush --}}
