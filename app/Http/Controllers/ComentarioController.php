<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Http\Requests\Comentario\StoreComentarioRequest;
use App\Http\Requests\Comentario\UpdateComentarioRequest;

/**
 * Class ComentarioController
 * @package App\Http\Controllers
 */
class ComentarioController extends Controller
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
        $comentarios = Comentario::paginate(10);

        return view('comentario.index', compact('comentarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comentario = new Comentario();
        return view('comentario.create', compact('comentario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComentarioRequest $request)
    {

        Comentario::create($request->all());

        return redirect()->route('comentarios.index')
            ->with('success', 'Comentario enviado con éxito...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comentario = Comentario::find($id);

        return view('comentario.show', compact('comentario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comentario = Comentario::find($id);

        return view('comentario.edit', compact('comentario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Comentario $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComentarioRequest $request, Comentario $comentario)
    {

        $data = $request->only('comentario','nombreautor','email');

        $comentario->update($data);

        return redirect()->route('comentarios.index')
            ->with('success', 'Comentario editado con éxito...');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $comentario = Comentario::find($id)->delete();

        return redirect()->route('comentarios.index')
            ->with('success', 'Comentario eliminado con éxito...');
    }
}
