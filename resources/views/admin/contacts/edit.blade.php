@extends('admin.layout')

@section('title', 'Edit Kontak')
@section('page-title', 'Edit Kontak')

@section('content')
    <section class="admin-card">
        <form action="{{ route('admin.contacts.update', $contact) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.contacts.form')
            <button class="btn btn-pink" type="submit">Update</button>
            <a class="btn btn-light" href="{{ route('admin.contacts.index') }}">Batal</a>
        </form>
    </section>
@endsection
