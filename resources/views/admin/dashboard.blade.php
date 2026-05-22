@extends('admin.layout')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')
    <div class="stats-grid">
        <div class="stat-card"><span>Portfolio</span><strong>{{ $portfolioCount }}</strong></div>
        <div class="stat-card"><span>Pengalaman</span><strong>{{ $experienceCount }}</strong></div>
        <div class="stat-card"><span>Skill</span><strong>{{ $skillCount }}</strong></div>
        <div class="stat-card"><span>Kontak</span><strong>{{ $contactCount }}</strong></div>
    </div>

    <section class="admin-card mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h5 mb-0">Portfolio Terbaru</h2>
            <a class="btn btn-sm btn-pink" href="{{ route('admin.portfolios.create') }}">Tambah Portfolio</a>
        </div>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead><tr><th>Judul</th><th>Role</th><th>Tahun</th></tr></thead>
                <tbody>
                    @forelse ($latestPortfolios as $portfolio)
                        <tr><td>{{ $portfolio->title }}</td><td>{{ $portfolio->role }}</td><td>{{ $portfolio->year }}</td></tr>
                    @empty
                        <tr><td colspan="3" class="text-muted">Belum ada data portfolio.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
