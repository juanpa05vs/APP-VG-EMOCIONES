<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\User;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index()
    {
        $usuarios = User::orderBy('name')->get();
        $reportes = Reporte::with('user')->latest()->get();

        return view('reportes.index', compact('usuarios', 'reportes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'tipo' => 'required|string|max:100',
            'periodo' => 'required|string|max:100',
        ]);

        $data['estado'] = 'Generado';

        Reporte::create($data);

        return redirect()->route('reportes.index')->with('success', 'Reporte generado correctamente.');
    }
}