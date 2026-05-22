@extends('admin.layout')

@section('title', 'Tambah Skill')
@section('page-title', 'Tambah Skill')

@section('content')
    <section class="admin-card">
        <form action="{{ route('admin.skills.store') }}" method="POST">
            @csrf
            @include('admin.skills.form')
            <button class="btn btn-pink" type="submit">Simpan</button>
            <a class="btn btn-light" href="{{ route('admin.skills.index') }}">Batal</a>
        </form>
    </section>
@endsection
