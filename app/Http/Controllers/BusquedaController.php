<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//AGREGUE
use App\Models\Libro;
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
        $texto = trim($request->get('texto'));

        $libros=DB::table('libros')
        ->join('users','users.id', '=' ,'libros.iduser')
        ->join('categorias','categorias.idcategoria', '=' ,'libros.idcategoria')
        ->join('autores','autores.idautor', '=' ,'libros.idautor')
        ->select('libros.idlibro as idlibro','users.name as usuario' ,'categorias.nombrecategoria as categoria',
         'autores.nombreautor as autor', 'libros.titulolibro as titulolibro', 'libros.idiomalibro as idioma',
         'libros.descripcionlibro as descripcionlibro', 'libros.created_at as fecha')
         ->where('libros.titulolibro','LIKE','%'.$texto.'%')
        ->orderBy('libros.titulolibro')
        ->paginate(8);

        return view('busqueda.index', compact('libros','texto'));
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

}
