@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Contato</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">
                <strong>Nome:</strong> {{ $user->name }}<br>
                <strong>Contato:</strong> {{ $user->contact }}<br>
                <strong>Email:</strong> {{ $user->email }}
            </p>
        </div>

        <div class="mt-3">
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>

            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Tem certeza?')">Deletar</button>
            </form>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection