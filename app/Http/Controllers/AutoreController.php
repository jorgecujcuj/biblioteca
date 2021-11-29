<?php

namespace App\Http\Controllers;

use App\Models\Autore;
use Illuminate\Http\Request;

/**
 * Class AutoreController
 * @package App\Http\Controllers
 */
class AutoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = Autore::paginate();

        return view('autore.index', compact('autores'))
            ->with('i', (request()->input('page', 1) - 1) * $autores->perPage());
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
    public function store(Request $request)
    {
        request()->validate(Autore::$rules);

        $autore = Autore::create($request->all());

        return redirect()->route('autores.index')
            ->with('success', 'Autore created successfully.');
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
    public function update(Request $request, Autore $autore)
    {
        request()->validate(Autore::$rules);

        $autore->update($request->all());

        return redirect()->route('autores.index')
            ->with('success', 'Autore updated successfully');
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
            ->with('success', 'Autore deleted successfully');
    }
}
