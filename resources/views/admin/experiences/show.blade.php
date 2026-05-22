@extends('admin.layout')

@section('title', $experience->event_name)
@section('page-title', 'Detail Pengalaman')

@section('content')
    <section class="admin-card detail-view">
        @include('admin.shared.preview', ['images' => $experience->image_paths])
        <h2>{{ $experience->event_name }}</h2>
        <p class="text-muted">{{ $experience->position }} • {{ $experience->year }}</p>
        <p>{{ $experience->description }}</p>
        <a class="btn btn-pink" href="{{ route('admin.experiences.edit', $experience) }}">Edit</a>
        <a class="btn btn-light" href="{{ route('admin.experiences.index') }}">Kembali</a>
    </section>
@endsection
