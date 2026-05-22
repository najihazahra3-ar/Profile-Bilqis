@extends('admin.layout')

@section('title', $portfolio->title)
@section('page-title', 'Detail Portfolio')

@section('content')
    <section class="admin-card detail-view">
        @include('admin.shared.preview', ['images' => $portfolio->image_paths])
        <h2>{{ $portfolio->title }}</h2>
        <p class="text-muted">{{ $portfolio->role }} • {{ $portfolio->year }}</p>
        <p>{{ $portfolio->description }}</p>
        <a class="btn btn-pink" href="{{ route('admin.portfolios.edit', $portfolio) }}">Edit</a>
        <a class="btn btn-light" href="{{ route('admin.portfolios.index') }}">Kembali</a>
    </section>
@endsection
