@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Lista de Contatos</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Novo Contato</a>
    <div class="row">
        @foreach($users as $user)
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text">
                        <strong>Contato:</strong> {{ $user->contact }}<br>
                        <strong>Email:</strong> {{ $user->email }}
                    </p>
                    @auth
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Detalhes</a>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Deletar</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection