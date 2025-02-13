<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function index() {
        $profesores = Profesor::all();
        return response($profesores);
    }

    public function getProfesor($id) {
        $profesor = Profesor::find($id);
        if($profesor == null) {
            return response(['message' => 'profesor no encontrado'], 404);
        }
        return response()->json($profesor);
    }

    public function newProfesor(Request $request){
        $profesor = Profesor::create($request -> all());
        return response()->json($profesor);
    }

    public function updateProfesor(Request $request, $id) {
        $profesor = Profesor::find($id);
        if($profesor == null) {
            return response(['message' => 'profesor no encontrado'], 404);
        }
        $profesor->nombre = $request->nombre;
        $profesor->ocupacion = $request->ocupacion;
        $profesor->descripcion = $request->descripcion;
        $profesor->imagen = $request->imagen;
        $profesor->drive = $request->drive;
        $profesor->save();
        return response($profesor);
    }
    public function destroyProfesor ($id) {
        $profesor = Profesor::find($id);
        if($profesor == null) {
            return response(['message' => 'profesor no encontrado'], 404);
        }
        $profesor->delete();
        return response(['message' => 'profesor eliminado']);
    }
}
