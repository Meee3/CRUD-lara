@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mb-4">Detalhes do Contato</h2>

        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> {{ $contact->id }}</p>
                <p><strong>Nome:</strong> {{ $contact->name }}</p>
                <p><strong>Contato:</strong> {{ $contact->contact }}</p>
                <p><strong>Email:</strong> {{ $contact->email }}</p>
            </div>
        </div>

        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Voltar</a>
            @auth
            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Tem certeza que deseja remover?')">Deletar</button>
            </form>
            @endauth
        </div>
    </div>
</div>
@endsection
