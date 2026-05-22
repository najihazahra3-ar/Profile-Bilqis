<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('admin.contacts.index', [
            'contacts' => Contact::latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.contacts.create', ['contact' => new Contact()]);
    }

    public function store(Request $request): RedirectResponse
    {
        Contact::create($this->validatedData($request));

        return redirect()->route('admin.contacts.index')->with('success', 'Kontak berhasil ditambahkan.');
    }

    public function edit(Contact $contact): View
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $contact->update($this->validatedData($request));

        return redirect()->route('admin.contacts.index')->with('success', 'Kontak berhasil diperbarui.');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Kontak berhasil dihapus.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:120'],
            'instagram' => ['required', 'string', 'max:120'],
            'whatsapp' => ['required', 'string', 'max:30'],
        ]);
    }
}
