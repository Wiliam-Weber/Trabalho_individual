<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Tarefas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form method="GET" class="mb-3 d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nome" value="{{ request('search') }}">
                <select name="categoria_id" class="form-select">
                    <option value="">Todas Categorias</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>

            <a href="{{ route('tarefas.create') }}" class="btn btn-success mb-3">Criar Nova Tarefa</a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tarefas as $tarefa)
                        <tr>
                            <td>{{ $tarefa->nome }}</td>
                            <td>{{ $tarefa->categoria->nome ?? 'Sem categoria' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="2">Nenhuma tarefa encontrada.</td></tr>
                    @endforelse
                </tbody>
            </table>

            {{ $tarefas->links() }}

        </div>
    </div>
</x-app-layout>
