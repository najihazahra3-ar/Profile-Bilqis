@extends('admin.layout')

@section('title', 'Edit Pengalaman')
@section('page-title', 'Edit Pengalaman Acara')

@section('content')
    <section class="admin-card">
        <form action="{{ route('admin.experiences.update', $experience) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.experiences.form')
            <button class="btn btn-pink" type="submit">Update</button>
            <a class="btn btn-light" href="{{ route('admin.experiences.index') }}">Batal</a>
        </form>
    </section>
@endsection
