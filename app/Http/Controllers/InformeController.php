<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Falta;
use App\Models\Horario;
use Carbon\Carbon;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $hoy = Carbon::today()->toDateString(); 
        $diaSemana = Carbon::today()->dayOfWeekIso; // 1 (Lunes) a 7 (Domingo)
   
        // 1. Buscamos profesores que faltan hoy
        $ausentesIds = Falta::where('fecha_inicio', '<=', $hoy)
                            ->where('fecha_fin', '>=', $hoy)
                            ->pluck('user_id');
   
        // 2. Buscamos sus horarios para hoy
        $huecos = Horario::with(['profesor', 'aula', 'grupo'])
                        ->whereIn('user_id', $ausentesIds)
                        ->where('dia_semana', $diaSemana)
                        ->orderBy('hora_orden')
                        ->get();

         return view('informes.index', compact('huecos', 'hoy'));                
                            
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
