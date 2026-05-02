@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Criar Novo Contato</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                id="name" name="name" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contato</label>
            <input type="text" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact') }}"
                id="contact" name="contact" required>
            @error('contact')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                id="email" name="email" required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
</div>
@endsection