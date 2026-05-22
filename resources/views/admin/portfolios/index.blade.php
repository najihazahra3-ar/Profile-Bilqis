@extends('admin.layout')

@section('title', 'Kelola Portfolio')
@section('page-title', 'Kelola Portfolio')
@section('action')
    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-pink">Tambah Portfolio</a>
@endsection

@section('content')
    <section class="admin-card">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead><tr><th>Foto</th><th>Judul</th><th>Role</th><th>Tahun</th><th>Aksi</th></tr></thead>
                <tbody>
                    @forelse ($portfolios as $portfolio)
                        <tr>
                            <td>@include('admin.shared.thumb', ['images' => $portfolio->image_paths])</td>
                            <td>{{ $portfolio->title }}</td>
                            <td>{{ $portfolio->role }}</td>
                            <td>{{ $portfolio->year }}</td>
                            <td>@include('admin.shared.actions', ['show' => route('admin.portfolios.show', $portfolio), 'edit' => route('admin.portfolios.edit', $portfolio), 'delete' => route('admin.portfolios.destroy', $portfolio)])</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-muted">Belum ada portfolio.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $portfolios->links() }}
    </section>
@endsection
