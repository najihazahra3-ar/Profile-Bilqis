@extends('admin.layout')

@section('title', 'Kelola Kontak')
@section('page-title', 'Kelola Kontak')
@section('action')
    <a href="{{ route('admin.contacts.create') }}" class="btn btn-pink">Tambah Kontak</a>
@endsection

@section('content')
    <section class="admin-card">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead><tr><th>Telepon</th><th>Email</th><th>Instagram</th><th>WhatsApp</th><th>Aksi</th></tr></thead>
                <tbody>
                    @forelse ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->instagram }}</td>
                            <td>{{ $contact->whatsapp }}</td>
                            <td>@include('admin.shared.actions', ['edit' => route('admin.contacts.edit', $contact), 'delete' => route('admin.contacts.destroy', $contact)])</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-muted">Belum ada kontak.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $contacts->links() }}
    </section>
@endsection
