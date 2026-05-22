@extends('admin.layout')

@section('title', 'Tambah Portfolio')
@section('page-title', 'Tambah Portfolio')

@section('content')
    <section class="admin-card">
        <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.portfolios.form')
            <button class="btn btn-pink" type="submit">Simpan</button>
            <a class="btn btn-light" href="{{ route('admin.portfolios.index') }}">Batal</a>
        </form>
    </section>
@endsection
