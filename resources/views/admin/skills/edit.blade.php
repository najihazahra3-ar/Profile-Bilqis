@extends('admin.layout')

@section('title', 'Edit Skill')
@section('page-title', 'Edit Skill')

@section('content')
    <section class="admin-card">
        <form action="{{ route('admin.skills.update', $skill) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.skills.form')
            <button class="btn btn-pink" type="submit">Update</button>
            <a class="btn btn-light" href="{{ route('admin.skills.index') }}">Batal</a>
        </form>
    </section>
@endsection
