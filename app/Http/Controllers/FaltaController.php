<?php

namespace App\Http\Controllers;

use App\Models\Falta;
use App\Models\User;
use Illuminate\Http\Request;

class FaltaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $faltas = Falta::with('profesor')->orderBy('fecha_inicio', 'desc')->get();
        return view('faltas.index', compact('faltas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $profesores = User::all();
        return view('faltas.create', compact('profesores'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request ->validate([
        'user_id' => 'required|exists:users,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        Falta::create([
            'user_id' => $request->user_id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
        ]);

        return redirect()->route('faltas.create')->with('success', 'Falta registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Falta $falta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Falta $falta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Falta $falta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Falta $falta)
    {
        //
    }
}
