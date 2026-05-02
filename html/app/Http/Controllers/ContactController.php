<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|min:6',
            'contact' => 'required|digits:9|unique:contacts,contact',
            'email'   => 'required|email|unique:contacts,email',
        ]);

        Contact::create([
            'name'    => $request->name,
            'contact' => $request->contact,
            'email'   => $request->email,
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contato criado com sucesso.');
    }

    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, string $id)
    {
        $contact = Contact::findOrFail($id);

        $request->validate([
            'name'    => 'required|min:6',
            'contact' => 'required|digits:9|unique:contacts,contact,' . $id,
            'email'   => 'required|email|unique:contacts,email,' . $id,
        ]);

        $contact->update([
            'name'    => $request->name,
            'contact' => $request->contact,
            'email'   => $request->email,
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contato atualizado com sucesso.');
    }

    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contato removido com sucesso.');
    }
}
