<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bem-vindo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white p-6 rounded shadow">
                <a href="{{ route('categorias.index') }}" class="btn btn-primary m-2">Gerenciar Categorias</a>
                <a href="{{ route('tarefas.index') }}" class="btn btn-success m-2">Gerenciar Tarefas</a>
            </div>
        </div>
    </div>
</x-app-layout>
