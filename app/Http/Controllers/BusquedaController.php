<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//AGREGUE
use App\Models\Libro;
use App\Models\Comentario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BusquedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = trim($request->get('name'));

        $libros=DB::table('libros')
        ->join('users','users.id', '=' ,'libros.iduser')
        ->join('categorias','categorias.idcategoria', '=' ,'libros.idcategoria')
        ->join('autores','autores.idautor', '=' ,'libros.idautor')
        ->select('libros.idlibro as idlibro','users.name as usuario' ,'categorias.nombrecategoria as categoria',
         'autores.nombreautor as autor', 'libros.titulolibro as titulolibro', 'libros.idiomalibro as idioma',
         'libros.descripcionlibro as descripcionlibro', 'libros.created_at as fecha')
         ->where('libros.titulolibro','LIKE','%'.$name.'%')
        ->orderBy('libros.titulolibro')
        ->paginate(8);

        return view('busqueda.index', compact('libros','name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idlibro)
    {
        
        //$libro = Libro::find($idlibro);
        $libro=DB::table('libros')
        ->join('users','users.id', '=' ,'libros.iduser')
        ->join('categorias','categorias.idcategoria', '=' ,'libros.idcategoria')
        ->join('autores','autores.idautor', '=' ,'libros.idautor')
        ->select('libros.idlibro as idlibro','users.name as usuario' ,'categorias.nombrecategoria as categoria',
         'autores.nombreautor as autor', 'libros.titulolibro as titulolibro', 'libros.idiomalibro as idioma',
         'libros.descripcionlibro as descripcionlibro', 'libros.created_at as fecha')
         ->where('libros.idlibro',$idlibro)->first();

        return view('busqueda.show', compact('libro'));
        //return $libro;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comentario = new Comentario();

        return view('busqueda.create', compact('comentario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Comentario::$rules);

        $comentario = Comentario::create($request->all());

        $mensaje = "Comentario enviado con éxito";

        return redirect()->route('busquedas.index')
        ->with('success', $mensaje);
    }

}
