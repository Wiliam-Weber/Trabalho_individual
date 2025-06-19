<x-app-layout>
    <x-slot name="header">
        Criar Categoria
    </x-slot>

    <div class="container mt-4">
        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Categoria</label>
                <input 
                    type="text" 
                    class="form-control @error('nome') is-invalid @enderror" 
                    id="nome" 
                    name="nome" 
                    value="{{ old('nome') }}" 
                    required
                >
                @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</x-app-layout>
