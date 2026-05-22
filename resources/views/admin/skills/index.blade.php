@extends('admin.layout')

@section('title', 'Kelola Skill')
@section('page-title', 'Kelola Skill')
@section('action')
    <a href="{{ route('admin.skills.create') }}" class="btn btn-pink">Tambah Skill</a>
@endsection

@section('content')
    <section class="admin-card">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead><tr><th>Nama</th><th>Icon</th><th>Level</th><th>Aksi</th></tr></thead>
                <tbody>
                    @forelse ($skills as $skill)
                        <tr>
                            <td>{{ $skill->name }}</td>
                            <td>{{ $skill->icon ?: '-' }}</td>
                            <td>
                                <div class="progress admin-progress"><div class="progress-bar" style="width: {{ $skill->level }}%">{{ $skill->level }}%</div></div>
                            </td>
                            <td>@include('admin.shared.actions', ['edit' => route('admin.skills.edit', $skill), 'delete' => route('admin.skills.destroy', $skill)])</td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-muted">Belum ada skill.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $skills->links() }}
    </section>
@endsection
