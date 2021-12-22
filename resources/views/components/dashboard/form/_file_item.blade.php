<div class="mr-2 position-relative file__item mb-2">
    <button class="position-absolute delete__file__btn __confirm__delete__btn"
            data-event-name="deleteFileItemInDbEvent"
            data-url="{{ route('dashboard.files.delete', $item->id) }}"
            type="button">x</button>
    @if($item->file_type === \App\Models\File\File::TYPE_IMAGE)
        <img src="{{ $item->file_path }}" width="100" height="100" alt="">
    @else
        <span class="mr-5 text-primary p-2">{{ $item->file_name }}</span>
    @endif
</div>
