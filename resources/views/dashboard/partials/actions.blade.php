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

        <form action="{{ route('dashboard.' . $name . '.destroy', $name_id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="dropdown-item text-danger">
                <i class="fas fa-trash-alt mx-1"></i>
                {{ __('action.delete') }}</button>
        </form>
    </div>
</div>
