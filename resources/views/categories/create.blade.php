@extends('layout')

@section('content')
    <h2>Nova Categoria</h2>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição (Opcional):</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
@endsection