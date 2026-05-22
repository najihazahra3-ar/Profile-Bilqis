@php
    $previewImages = $images ?? [];
    if (empty($previewImages) && !empty($image)) {
        $previewImages = is_array($image) ? $image : [ $image ];
    }
@endphp

@if (!empty($previewImages))
    <div class="preview-gallery">
        @foreach ($previewImages as $preview)
            <div class="preview-image-item">
                <img class="preview-image" src="{{ asset('storage/'.$preview) }}" alt="Preview gambar">
            </div>
        @endforeach
    </div>
@else
    <div class="preview-image preview-empty">Preview gambar akan tampil di sini</div>
@endif
