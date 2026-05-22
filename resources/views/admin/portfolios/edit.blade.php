@extends('admin.layout')

@section('title', 'Edit Portfolio')
@section('page-title', 'Edit Portfolio')

@section('content')
    <section class="admin-card">
        <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.portfolios.form')
            <button class="btn btn-pink" type="submit">Update</button>
            <a class="btn btn-light" href="{{ route('admin.portfolios.index') }}">Batal</a>
        </form>
    </section>
@endsection
