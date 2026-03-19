<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    private function usuariosDemo()
    {
        return collect([
            (object) [
                'id' => 1,
                'name' => 'Juan Pablo',
                'email' => 'juanpa05vs@gmail.com',
                'rol' => 'Administrador',
                'estado' => 'Activo',
                'fecha_registro' => '2026-03-10',
            ],
            (object) [
                'id' => 2,
                'name' => 'Charbel Pérez',
                'email' => 'charbelp3@gmail.com',
                'rol' => 'Usuario',
                'estado' => 'Activo',
                'fecha_registro' => '2026-03-12',
            ],
            (object) [
                'id' => 3,
                'name' => 'Karol Garfias',
                'email' => 'karol@correo.com',
                'rol' => 'Investigador',
                'estado' => 'Activo',
                'fecha_registro' => '2026-03-14',
            ],
            (object) [
                'id' => 4,
                'name' => 'David Luna',
                'email' => 'david@correo.com',
                'rol' => 'Usuario',
                'estado' => 'Pendiente',
                'fecha_registro' => '2026-03-16',
            ],
        ]);
    }

    public function index()
    {
        $usuarios = $this->usuariosDemo();

        $metricas = [
            'total' => $usuarios->count(),
            'administradores' => $usuarios->where('rol', 'Administrador')->count(),
            'investigadores' => $usuarios->where('rol', 'Investigador')->count(),
            'usuarios' => $usuarios->where('rol', 'Usuario')->count(),
        ];

        return view('usuarios.index', compact('usuarios', 'metricas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'rol' => 'required|string',
            'password' => 'required|min:8',
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario registrado correctamente.');
    }

    public function edit($usuario)
    {
        $usuario = $this->usuariosDemo()->firstWhere('id', (int) $usuario);

        if (!$usuario) {
            abort(404);
        }

        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $usuario)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'rol' => 'required|string',
            'estado' => 'required|string',
            'password' => 'nullable|min:8',
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($usuario)
    {
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
}
