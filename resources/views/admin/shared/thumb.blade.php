@php
    $thumbImage = null;
    if (!empty($images) && is_array($images) && count($images)) {
        $thumbImage = $images[0];
    }
    if (empty($thumbImage) && !empty($image)) {
        $thumbImage = is_array($image) ? $image[0] ?? null : $image;
    }
@endphp

@if ($thumbImage)
    <img class="table-thumb" src="{{ asset('storage/'.$thumbImage) }}" alt="Thumbnail">
@else
    <div class="table-thumb placeholder-thumb">No Image</div>
@endif
