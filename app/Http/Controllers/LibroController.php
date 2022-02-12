<?php

namespace App\Http\Controllers;

use App\Models\Libro;
//AGREGUE
use Exception;
use App\Models\Categoria;
use App\Models\Autore;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Libro\storeLibroRequest;
use App\Http\Requests\Libro\updateLibroRequest;
use Illuminate\Support\Facades\File;


/**
 * Class LibroController
 * @package App\Http\Controllers
 */
class LibroController extends Controller
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
    public function index(Request $request)
    {
        $name = trim($request->get('name'));

        $libros=DB::table('libros')
        ->join('users','users.id', '=' ,'libros.iduser')
        ->join('categorias','categorias.id', '=' ,'libros.idcategoria')
        ->join('autores','autores.id', '=' ,'libros.idautor')
        ->select('libros.id as id','users.name as usuario' ,'categorias.nombrecategoria as categoria',
         'autores.nombreautor as autor','libros.imglibro as imglibro', 'libros.titulolibro as titulolibro', 'libros.idiomalibro as idioma',
         'libros.descripcionlibro as descripcionlibro', 'libros.created_at as fecha')
         ->where('categorias.nombrecategoria','LIKE','%'.$name.'%')
         ->orwhere('libros.titulolibro','LIKE','%'.$name.'%')
         ->orwhere('autores.nombreautor','LIKE','%'.$name.'%')
        ->orderBy('libros.titulolibro')
        ->paginate(15);

        return view('libro.index', compact('libros','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libro = new Libro();
        $categoria = Categoria::orderBy('id')->get();
        $autor = Autore::orderBy('id')->get();
        return view('libro.create', compact('libro','categoria','autor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeLibroRequest $request)
    {
        /*$request->validate([
            'iduser' => ['required'],
            'idcategoria' => ['required'],
            'idautor' => ['required'],
            'imglibro' => ['required','image','mimes:jpeg,png,jpg,gif','max:2048','unique:libros,imglibro'],
            'titulolibro' => ['required','file','mimes:pdf','unique:libros,titulolibro'],
            'idiomalibro' => ['nullable','max:15'],
            'descripcionlibro' => ['nullable','max:120'],
        ]);*/

        try {
            DB::beginTransaction();
            $lib=new Libro;
            $lib->iduser=$request->get('iduser');
            $lib->idcategoria=$request->get('idcategoria');
            $lib->idautor=$request->get('idautor');

            $imgexite=$request->file('imglibro')->getClientOriginalName();
            if (Libro::where('imglibro', $imgexite)->exists()) {
                $mensaje = "El libro ya existe verifique el nombre de la Portada.";
                return redirect()->route('libros.index')
                    ->with('success', $mensaje);
            }

            $pdfexite=$request->file('titulolibro')->getClientOriginalName();
            if (Libro::where('titulolibro', $pdfexite)->exists()) {
                $mensaje = "El libro ya existe verifique el nombre del PDF.";
                return redirect()->route('libros.index')
                    ->with('success', $mensaje);
            }

            if($request->hasFile('imglibro')){
                $img=$request->file('imglibro');
                $img->move(public_path().'/datalibros/',$img->getClientOriginalName());
                $lib->imglibro=$img->getClientOriginalName();
            }

            if($request->hasFile('titulolibro')){
                $archivo=$request->file('titulolibro');
                $archivo->move(public_path().'/datalibros/',$archivo->getClientOriginalName());
                $lib->titulolibro=$archivo->getClientOriginalName();
            }

            $lib->idiomalibro=$request->get('idiomalibro');
            $lib->descripcionlibro=$request->get('descripcionlibro');
            $lib->save();
            DB::commit();
            $mensaje = "Libro creada con éxito...";
        } catch (Exception $e) {
            DB::rollback();
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                $mensaje = "El libro ya existe verifique el nombre de la Portada y el PDF";
            }

        }

        return redirect()->route('libros.index')
            ->with('success', $mensaje);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::find($id);

        return view('libro.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::find($id);
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
    public function update(updateLibroRequest $request, $libro)
    {
        /*
        $request->validate([
            'iduser' => ['required'],
            'idcategoria' => ['required'],
            'idautor' => ['required'],
            'imglibro' => ['image','mimes:jpeg,png,jpg,gif','max:2048','unique:libros,imglibro'],
            'titulolibro' => ['file','mimes:pdf','unique:libros,titulolibro'],
            'idiomalibro' => ['nullable','max:24'],
            'descripcionlibro' => ['nullable','max:120'],
        ]);*/

        try {
            DB::beginTransaction();
            $lib = Libro::find($libro);
            $lib->iduser=$request->get('iduser');
            $lib->idcategoria=$request->get('idcategoria');
            $lib->idautor=$request->get('idautor');

            if($request->hasFile('titulolibro')){

                $pdfexite=$request->file('titulolibro')->getClientOriginalName();
                if (Libro::where('titulolibro', $pdfexite)->exists()) {
                    $mensaje = "El libro ya existe verifique el nombre del PDF.";
                    return redirect()->route('libros.index')
                        ->with('success', $mensaje);
                }

                $destination = public_path().'/datalibros/'.$lib->titulolibro;
                if(File::exists($destination)){
                   File::delete($destination);
                }

                $archivo=$request->file('titulolibro');
                $archivo->move(public_path().'/datalibros/',$archivo->getClientOriginalName());
                $lib->titulolibro=$archivo->getClientOriginalName();
            }
            if($request->hasFile('imglibro')){

                $imgexite=$request->file('imglibro')->getClientOriginalName();
                if (Libro::where('imglibro', $imgexite)->exists()) {
                    $mensaje = "El libro ya existe verifique el nombre de la Portada.";
                    return redirect()->route('libros.index')
                        ->with('success', $mensaje);
                }

                $destination = public_path().'/datalibros/'.$lib->imglibro;
                if(File::exists($destination)){
                   File::delete($destination);
                }

                $img=$request->file('imglibro');
                $img->move(public_path().'/datalibros/',$img->getClientOriginalName());
                $lib->imglibro=$img->getClientOriginalName();
            }

            $lib->idiomalibro=$request->get('idiomalibro');
            $lib->descripcionlibro=$request->get('descripcionlibro');
            //return $lib;
            $lib->update();
            DB::commit();
            $mensaje = "Libro editado con éxito...";
        } catch (Exception $e) {
            DB::rollback();
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                $mensaje = "El libro ya existe verifique el nombre de la Portada y el PDF";
            }
        }

        return redirect()->route('libros.index')
            ->with('success', $mensaje);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lib = Libro::find($id);

        $destinationuno = public_path().'/datalibros/'.$lib->titulolibro;
        $destinationdos = public_path().'/datalibros/'.$lib->imglibro;

        if(File::exists($destinationuno)){
            File::delete($destinationuno);
        }

        if(File::exists($destinationdos)){
            File::delete($destinationdos);
        }

        $libro = Libro::find($id)->delete();

        return redirect()->route('libros.index')
            ->with('success', 'Libro eliminado con éxito...');
    }
}
