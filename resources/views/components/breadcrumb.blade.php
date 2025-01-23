@foreach ($breadcrumbs as $breadcrumb)
    @if ($loop->last)
        <span class="breadcrumb-item active" aria-current="page">
            {{ __('adminlte::adminlte.' . capitalize($breadcrumb['text']) ) }}
        </span>
    @else
        <a href="{{ $breadcrumb['url'] }}" class="breadcrumb-item">
            {{ __('adminlte::adminlte.' . $breadcrumb['text']) }}
        </a>
    @endif
@endforeach
