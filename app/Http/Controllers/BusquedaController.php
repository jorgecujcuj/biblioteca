<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//AGREGUE
use App\Models\Comentario;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Comentario\StoreComentarioRequest;


class BusquedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $categorias = Categoria::orderby('nombrecategoria')->get();

        $name = trim($request->get('name'));

        $libros=DB::table('libros')
        ->join('users','users.id', '=' ,'libros.iduser')
        ->join('categorias','categorias.id', '=' ,'libros.idcategoria')
        ->join('autores','autores.id', '=' ,'libros.idautor')
        ->select('libros.id as idlibro','users.name as usuario' ,'categorias.nombrecategoria as categoria',
         'autores.nombreautor as autor', 'libros.imglibro as imglibro','libros.titulolibro as titulolibro', 'libros.idiomalibro as idioma',
         'libros.descripcionlibro as descripcionlibro', 'libros.created_at as fecha')
         ->where('categorias.nombrecategoria','LIKE','%'.$name.'%')
         ->orwhere('libros.titulolibro','LIKE','%'.$name.'%')
         ->orwhere('autores.nombreautor','LIKE','%'.$name.'%')
        ->orderBy('libros.titulolibro')
        ->paginate(8);

        return view('busqueda.index', compact('categorias','libros','name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $libro=DB::table('libros')
        ->join('users','users.id', '=' ,'libros.iduser')
        ->join('categorias','categorias.id', '=' ,'libros.idcategoria')
        ->join('autores','autores.id', '=' ,'libros.idautor')
        ->select('libros.id as idlibro','users.name as usuario' ,'categorias.nombrecategoria as categoria',
         'autores.nombreautor as autor', 'libros.imglibro as imglibro', 'libros.titulolibro as titulolibro', 'libros.idiomalibro as idioma',
         'libros.descripcionlibro as descripcionlibro', 'libros.created_at as fecha')
         ->where('libros.id',$id)->first();

        return view('busqueda.show', compact('libro'));

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
    public function store(StoreComentarioRequest $request)
    {

        Comentario::create($request->all());

        $mensaje = "Comentario enviado con ??xito";

        return redirect()->route('busquedas.index')
        ->with('success', $mensaje);
    }

}
