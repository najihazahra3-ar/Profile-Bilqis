@extends('admin.layout')

@section('title', 'Tambah Pengalaman')
@section('page-title', 'Tambah Pengalaman Acara')

@section('content')
    <section class="admin-card">
        <form action="{{ route('admin.experiences.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.experiences.form')
            <button class="btn btn-pink" type="submit">Simpan</button>
            <a class="btn btn-light" href="{{ route('admin.experiences.index') }}">Batal</a>
        </form>
    </section>
@endsection
