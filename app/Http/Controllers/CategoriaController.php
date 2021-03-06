<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\Categoria\StoreCategoriaRequest;
use App\Http\Requests\Categoria\UpdateCategoriaRequest;

/**
 * Class CategoriaController
 * @package App\Http\Controllers
 */
class CategoriaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::paginate();

        return view('categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = new Categoria();
        return view('categoria.create', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriaRequest $request)
    {
        Categoria::create($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'La categoría se ha creada con éxito...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $idcategoria
     * @return \Illuminate\Http\Response
     */
    public function show($idcategoria)
    {
        $categoria = Categoria::find($idcategoria);

        return view('categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $idcategoria
     * @return \Illuminate\Http\Response
     */
    public function edit($idcategoria)
    {
        $categoria = Categoria::find($idcategoria);

        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        $data = $request->only('nombrecategoria','descripcioncategoria');

        $categoria->update($data);

        return redirect()->route('categorias.index')
            ->with('success', 'La categoría ha sido editada con éxito...');
    }

    /**
     * @param int $idcategoria
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($idcategoria)
    {
        $categoria = Categoria::find($idcategoria)->delete();

        return redirect()->route('categorias.index')
            ->with('success', 'La categoría se ha eliminado con éxito...');
    }
}
