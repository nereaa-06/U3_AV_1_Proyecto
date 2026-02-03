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
    public function index( Request $request)
    {
        //
       $query = Falta::with('profesor');

    // 2. Si el usuario envía fechas de filtro, filtramos los resultados
        if ($request->filled('desde') && $request->filled('hasta')) {
        $query->where('fecha_inicio', '>=', $request->desde)
              ->where('fecha_fin', '<=', $request->hasta);
    }

    // 3. Obtenemos los resultados ordenados por fecha
    $faltas = $query->orderBy('fecha_inicio', 'desc')->get();

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

        Falta::create($request->all());

        return redirect()->route('faltas.index')->with('success', 'Falta registrada.');    }

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
