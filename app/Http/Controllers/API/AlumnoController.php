<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\NuevoAlumno;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::orderBy('created_at','desc')->with('sede')->get();

        return Response::make(['code' => 1, 'data' => [ 'alumnos' => $alumnos ] ], 200, ['Content-Type' => 'application/json']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'apellido' => 'required',
            'apellido_materno' => 'nullable',
            'correo_electronico' => ['required','string','email', Rule::unique('alumnos', 'correo_electronico')],
            'sede_id' => ['required','integer', Rule::exists('sedes','id')],
        ]);

        if($validator->fails()) return Response::make(['code' => 0, 'data' => [
            'errors' => $validator->errors()
        ] ], 422, ['Content-Type' => 'application/json']);

        $validated = $validator->validated();

        $alumno = Alumno::create([
            'nombre' => $validated['nombre'],
            'apellido' => $validated['apellido'],
            'apellido_materno' => $validated['apellido_materno'],
            'correo_electronico' => $validated['correo_electronico'],
            'sede_id' => $validated['sede_id'],
        ]);

        Mail::to($alumno->correo_electronico)->send(new NuevoAlumno($alumno));

        return Response::make(['code' => 1, 'data' => [ 'alumno' => $alumno ] ], 200, ['Content-Type' => 'application/json']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $validator = Validator::make(['matricula' => $request->matricula], [
            'matricula' => ['required', Rule::exists('alumnos','matricula')]
        ]);

        if($validator->fails()) return Response::make(['code' => 0, 'data' => [
            'errors' => $validator->errors()
        ] ], 422, ['Content-Type' => 'application/json']);

        $alumno = Alumno::where('matricula', $request->matricula)->with('sede')->first();

        return Response::make(['code' => 1, 'data' => [ 'alumno' => $alumno ] ], 200, ['Content-Type' => 'application/json']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
