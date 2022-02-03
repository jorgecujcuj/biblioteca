<?php

namespace App\Http\Controllers;

use App\Models\Autore;
use Illuminate\Http\Request;
use App\Http\Requests\Autor\StoreAutorRequest;
use App\Http\Requests\Autor\UpdateAutorRequest;

/**
 * Class AutoreController
 * @package App\Http\Controllers
 */
class AutoreController extends Controller
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
        $autores = Autore::paginate();

        return view('autore.index', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autore = new Autore();
        return view('autore.create', compact('autore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAutorRequest $request)
    {

        Autore::create($request->all());

        return redirect()->route('autores.index')
            ->with('success', 'El autor se ha creada con éxito...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $idautor
     * @return \Illuminate\Http\Response
     */
    public function show($idautor)
    {
        $autore = Autore::find($idautor);

        return view('autore.show', compact('autore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $idautor
     * @return \Illuminate\Http\Response
     */
    public function edit($idautor)
    {
        $autore = Autore::find($idautor);

        return view('autore.edit', compact('autore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Autore $autore
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAutorRequest $request, Autore $autore)
    {
        $data = $request->only('nombreautor','descripcionautor');

        $autore->update($data);

        return redirect()->route('autores.index')
            ->with('success', 'El autor ha sido editado con éxito...');
    }

    /**
     * @param int $idautor
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($idautor)
    {
        $autore = Autore::find($idautor)->delete();

        return redirect()->route('autores.index')
            ->with('success', 'El autor se ha eliminado con éxito...');
    }
}
