@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Lista de Contatos</h2>
    @auth
    <a href="{{ route('contacts.create') }}" class="btn btn-primary">Novo Contato</a>
    @endauth
</div>

@if($contacts->isEmpty())
    <div class="alert alert-info">Nenhum contato encontrado.</div>
@else
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Contato</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->contact }}</td>
            <td>{{ $contact->email }}</td>
            <td>
                <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm">Detalhes</a>
                @auth
                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja remover?')">Deletar</button>
                </form>
                @endauth
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
