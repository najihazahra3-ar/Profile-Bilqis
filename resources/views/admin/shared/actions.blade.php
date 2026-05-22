<div class="d-flex gap-2">
    @isset($show)
        <a class="btn btn-sm btn-light" href="{{ $show }}">Detail</a>
    @endisset
    <a class="btn btn-sm btn-soft" href="{{ $edit }}">Edit</a>
    <form action="{{ $delete }}" method="POST" class="delete-form">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-outline-danger" type="submit">Hapus</button>
    </form>
</div>
