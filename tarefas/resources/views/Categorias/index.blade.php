@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Categorias</h1>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary">Nova Categoria</a>
    </div>

    @if($categorias->isEmpty())
        <p class="text-muted">Nenhuma categoria cadastrada.</p>
    @else
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Nome</th>
                    <th>Quantidade de Tarefas</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nome }}</td>
                        <td>{{ $categoria->tarefas->count() }}</td>
                        <td>
                            <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
