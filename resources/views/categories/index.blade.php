@extends('layout')

@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Nova Categoria</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        <a class="btn btn-warning btn-sm" href="{{ route('categories.edit', $category->id) }}">Editar</a>
                        
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection