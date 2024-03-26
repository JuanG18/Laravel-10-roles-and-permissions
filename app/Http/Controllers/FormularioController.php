<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulario;

class FormularioController extends Controller
{
    public function index()
    {
        $formularios = Formulario::all();
        return view('formularios.index', compact('formularios'));
    }


    public function create()
    {
        return view('formularios.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nivel_operativo' => 'required|in:Alta,Medio,Bajo',
            'nivel_financiero' => 'required|in:Alta,Medio,Bajo',
            'nivel_legal' => 'required|in:Alta,Medio,Bajo',
            'rto_dias' => 'required|integer',
            'rto_horas' => 'required|integer',
            'rto_minutos' => 'required|integer',
            'rpo_dias' => 'required|integer',
            'rpo_horas' => 'required|integer',
            'rpo_minutos' => 'required|integer',
        ]);

        // Calcula los pesos
        $peso_operativo = $request->nivel_operativo === 'Alta' ? 5 : ($request->nivel_operativo === 'Medio' ? 3 : 1);
        $peso_financiero = $request->nivel_financiero === 'Alta' ? 5 : ($request->nivel_financiero === 'Medio' ? 3 : 1);
        $peso_legal = $request->nivel_legal === 'Alta' ? 5 : ($request->nivel_legal === 'Medio' ? 3 : 1);

        // Calcula el valor inherente
        $valor_inherente = ($peso_operativo * 0.5) + ($peso_financiero * 0.2) + ($peso_legal * 0.3);

        // Determina la escala
        if ($valor_inherente >= 4.1) {
            $escala = "Crítico";
        } elseif ($valor_inherente >= 3.1) {
            $escala = "Alto";
        } elseif ($valor_inherente >= 2.1) {
            $escala = "Medio";
        } elseif ($valor_inherente > 0) {
            $escala = "Bajo";
        }

        // Guarda los datos del formulario
        Formulario::create([
            'fecha_elaboracion' => now(),
            'actividad' => $request->actividad,
            'nivel_operativo' => $request->nivel_operativo,
            'nivel_financiero' => $request->nivel_financiero,
            'nivel_legal' => $request->nivel_legal,
            'peso_operativo' => $peso_operativo,
            'peso_financiero' => $peso_financiero,
            'peso_legal' => $peso_legal,
            'valor_inherente' => $valor_inherente,
            'escala' => $escala,
            'rto_dias' => $request->rto_dias,
            'rto_horas' => $request->rto_horas,
            'rto_minutos' => $request->rto_minutos,
            'rpo_dias' => $request->rpo_dias,
            'rpo_horas' => $request->rpo_horas,
            'rpo_minutos' => $request->rpo_minutos,
        ]);

        return redirect()->back()->with('success', 'Formulario guardado exitosamente.');
    }
}
