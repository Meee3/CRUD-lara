@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Contato</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}" id="name" name="name" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contato</label>
            <input type="text" class="form-control @error('contact') is-invalid @enderror"
                value="{{ old('contact', $user->contact) }}" id="contact" name="contact" required>
            @error('contact')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email) }}" id="email" name="email" required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection