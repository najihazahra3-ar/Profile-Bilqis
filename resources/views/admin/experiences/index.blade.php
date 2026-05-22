@extends('admin.layout')

@section('title', 'Kelola Pengalaman')
@section('page-title', 'Kelola Pengalaman Acara')
@section('action')
    <a href="{{ route('admin.experiences.create') }}" class="btn btn-pink">Tambah Pengalaman</a>
@endsection

@section('content')
    <section class="admin-card">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead><tr><th>Foto</th><th>Acara</th><th>Jabatan</th><th>Tahun</th><th>Aksi</th></tr></thead>
                <tbody>
                    @forelse ($experiences as $experience)
                        <tr>
                            <td>@include('admin.shared.thumb', ['images' => $experience->image_paths])</td>
                            <td>{{ $experience->event_name }}</td>
                            <td>{{ $experience->position }}</td>
                            <td>{{ $experience->year }}</td>
                            <td>@include('admin.shared.actions', ['show' => route('admin.experiences.show', $experience), 'edit' => route('admin.experiences.edit', $experience), 'delete' => route('admin.experiences.destroy', $experience)])</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-muted">Belum ada pengalaman.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $experiences->links() }}
    </section>
@endsection
