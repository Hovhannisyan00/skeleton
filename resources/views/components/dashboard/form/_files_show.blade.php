<div class="__uploaded__files">
    <br>
    <h5>{{ __('__dashboard.uploaded_files') }}</h5>
    <div class="d-flex justify-content-start flex-wrap ">
        @isset($multiple)
            @foreach($value as $item)
                <x-dashboard.form._file_item :item="$item"/>
            @endforeach
        @else
            <x-dashboard.form._file_item :item="$value"/>
        @endif
    </div>
</div>
