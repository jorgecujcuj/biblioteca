<?php

namespace App\Http\Controllers;

use App\Models\Libro;
//AGREGUE
use App\Models\Categoria;
use App\Models\Autore;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/**
 * Class LibroController
 * @package App\Http\Controllers
 */
class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::paginate();

        return view('libro.index', compact('libros'))
            ->with('i', (request()->input('page', 1) - 1) * $libros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $libro = new Libro();
        $categoria = Categoria::orderBy('nombrecategoria')->get();
        $autor = Autore::orderBy('nombreautor')->get();
        return view('libro.create', compact('libro','categoria','autor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Libro::$rules);

        try {
            DB::beginTransaction();
            $lib=new Libro;
            $lib->iduser=$request->get('iduser');
            $lib->idcategoria=$request->get('idcategoria');
            $lib->idautor=$request->get('idautor');
            if($request->hasFile('titulolibro')){
                $archivo=$request->file('titulolibro');
                $archivo->move(public_path().'/datalibros/',$archivo->getClientOriginalName());
                $lib->titulolibro=$archivo->getClientOriginalName();
            }
            $lib->idiomalibro=$request->get('idiomalibro');
            $lib->descripcionlibro=$request->get('descripcionlibro');
            $lib->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        //$libro = Libro::create($request->all());
        //datalibros

        return redirect()->route('libros.index')
            ->with('success', 'Libro created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $idlibro
     * @return \Illuminate\Http\Response
     */
    public function show($idlibro)
    {
        $libro = Libro::find($idlibro);

        return view('libro.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $idlibro
     * @return \Illuminate\Http\Response
     */
    public function edit($idlibro)
    {
        $libro = Libro::find($idlibro);
        $categoria = Categoria::orderBy('nombrecategoria')->get();
        $autor = Autore::orderBy('nombreautor')->get();

        return view('libro.edit', compact('libro','categoria','autor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Libro $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $libro)
    {
        request()->validate(Libro::$rules);

        //$lib = Libro::find($libro);
        //return $lib;
        
        try {
            DB::beginTransaction();
            $lib = Libro::find($libro);
            $lib->iduser=$request->get('iduser');
            $lib->idcategoria=$request->get('idcategoria');
            $lib->idautor=$request->get('idautor');
            if($request->hasFile('titulolibro')){

                $destination = public_path().'/datalibros/'.$lib->titulolibro;
                if(File::exists($destination)){
                   File::delete($destination);
                }

                $archivo=$request->file('titulolibro');
                $archivo->move(public_path().'/datalibros/',$archivo->getClientOriginalName());
                $lib->titulolibro=$archivo->getClientOriginalName();
            }
            $lib->idiomalibro=$request->get('idiomalibro');
            $lib->descripcionlibro=$request->get('descripcionlibro');

            $lib->update();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        //$libro->update($request->all());

        return redirect()->route('libros.index')
            ->with('success', 'Libro updated successfully');
    }

    /**
     * @param int $idlibro
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($idlibro)
    {
        $lib = Libro::find($idlibro);

        $destination = public_path().'/datalibros/'.$lib->titulolibro;

        if(File::exists($destination)){
            File::delete($destination);
        }

        $libro = Libro::find($idlibro)->delete();

        return redirect()->route('libros.index')
            ->with('success', 'Libro deleted successfully');
    }
}