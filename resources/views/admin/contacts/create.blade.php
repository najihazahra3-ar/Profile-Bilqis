@extends('admin.layout')

@section('title', 'Tambah Kontak')
@section('page-title', 'Tambah Kontak')

@section('content')
    <section class="admin-card">
        <form action="{{ route('admin.contacts.store') }}" method="POST">
            @csrf
            @include('admin.contacts.form')
            <button class="btn btn-pink" type="submit">Simpan</button>
            <a class="btn btn-light" href="{{ route('admin.contacts.index') }}">Batal</a>
        </form>
    </section>
@endsection
