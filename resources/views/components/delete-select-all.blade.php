    <form action="" method="POST">
        @csrf
        @method('POST')
        <button type="submit" class="btn btn-danger mx-1">{{ __('action.delete_all') }} <i
                class="fas fa-trash-restore-alt mx-1"></i></button>
    </form>
