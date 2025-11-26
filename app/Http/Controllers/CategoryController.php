<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Listar categorias
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Mostrar formulário de criação
    public function create()
    {
        return view('categories.create');
    }

    // Salvar nova categoria
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'Categoria criada com sucesso.');
    }

    // Mostrar formulário de edição
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Atualizar categoria
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'Categoria atualizada!');
    }

    // Excluir categoria
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'Categoria excluída.');
    }
}