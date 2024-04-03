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

    public function edit(Formulario $formulario)
{

    return view('formularios.edit', [
        'formulario' => $formulario
    ]);

}


    public function store(Request $request )
    {
        // Validar los datos del formulario
        $request->validate([
            'nivel_operativo' => 'required|in:Alta,Medio,Bajo',
            'nivel_financiero' => 'required|in:Alta,Medio,Bajo',
            'nivel_legal' => 'required|in:Alta,Medio,Bajo',
            'rto_days' => 'required|integer',
            'rto_hours' => 'required|integer',
            'rto_minutes' => 'required|integer',
            'rpo_days' => 'required|integer',
            'rpo_hours' => 'required|integer',
            'rpo_minutes' => 'required|integer',
            'recurso_humano' => 'required',
            'herramientas' => 'required',
            'registros_vitales' => 'required',
            'recomendaciones_recuperacion' => 'required',

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
            'rto_days' => $request->rto_days,
            'rto_hours' => $request->rto_hours,
            'rto_minutes' => $request->rto_minutes,
            'rpo_days' => $request->rpo_days,
            'rpo_hours' => $request->rpo_hours,
            'rpo_minutes' => $request->rpo_minutes,
            'recurso_humano' => $request->recurso_humano,
            'herramientas' => $request->herramientas,
            'registros_vitales' => $request->registros_vitales,
            'recomendaciones_recuperacion' => $request->recomendaciones_recuperacion,


        ]);

        return redirect()->back()->with('success', 'Formulario guardado exitosamente.');
    }

    public function update(Request $request, Formulario $id)
{



    $request->validate([
        'nivel_operativo' => 'required|in:Alta,Medio,Bajo',
        'nivel_financiero' => 'required|in:Alta,Medio,Bajo',
        'nivel_legal' => 'required|in:Alta,Medio,Bajo',
        'rto_days' => 'required|integer',
        'rto_hours' => 'required|integer',
        'rto_minutes' => 'required|integer',
        'rpo_days' => 'required|integer',
        'rpo_hours' => 'required|integer',
        'rpo_minutes' => 'required|integer',
        'recurso_humano' => 'required',
        'herramientas' => 'required',
        'registros_vitales' => 'required',
        'recomendaciones_recuperacion' => 'required',
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

    // Actualizar los datos del formulario con los datos recibidos del formulario
    $id->update([
    'actividad' => $request->actividad,
    'nivel_operativo' => $request->nivel_operativo,
    'nivel_financiero' => $request->nivel_financiero,
    'nivel_legal' => $request->nivel_legal,
    'peso_operativo' => $peso_operativo,
    'peso_financiero' => $peso_financiero,
    'peso_legal' => $peso_legal,
    'valor_inherente' => $valor_inherente,
    'escala' => $escala,
    'rto_days' => $request->rto_days,
    'rto_hours' => $request->rto_hours,
    'rto_minutes' => $request->rto_minutes,
    'rpo_days' => $request->rpo_days,
    'rpo_hours' => $request->rpo_hours,
    'rpo_minutes' => $request->rpo_minutes,
    'recurso_humano' => $request->recurso_humano,
    'herramientas' => $request->herramientas,
    'registros_vitales' => $request->registros_vitales,
    'recomendaciones_recuperacion' => $request->recomendaciones_recuperacion,
]);

    // Redirigir a alguna vista o ruta después de la actualización exitosa
    return redirect()->route('formularios.index')
                     ->with('success', 'Formulario actualizado exitosamente.');
}

}
