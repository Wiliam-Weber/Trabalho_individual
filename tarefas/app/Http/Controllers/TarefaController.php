<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Models\Categoria;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index(Request $request)
    {
        // Buscar e filtrar (se quiser)
        $query = Tarefa::query();

        if ($request->has('search')) {
            $query->where('nome', 'like', '%' . $request->search . '%');
        }

        if ($request->has('categoria_id') && $request->categoria_id != '') {
            $query->where('categoria_id', $request->categoria_id);
        }

        $tarefas = $query->with('categoria')->paginate(10);

        $categorias = Categoria::all();

        return view('tarefas.index', compact('tarefas', 'categorias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('tarefas.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Tarefa::create($request->all());

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso.');
    }

    // Você pode implementar edit, update, destroy depois
}
