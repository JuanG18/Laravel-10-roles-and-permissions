<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\Formulario;
use Illuminate\Support\Facades\Auth;

class WordController extends Controller
{
    public function generateWord()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener los formularios asociados al usuario autenticado
        $formularios = $user->formularios;

        // Ruta de la plantilla
        $templatePath = public_path('documents/bia.docx');

        // Crear un nuevo objeto TemplateProcessor
        $templateProcessor = new TemplateProcessor($templatePath);

        // Iterar sobre los formularios del usuario
        foreach ($formularios as $index => $formulario) {
            // Obtener los datos del formulario
            $nombreUsuario = $formulario->user->name;
            $fechaCreacion = $formulario->fecha_elaboracion->format('d/m/Y');

            // Llenar la plantilla con los datos del formulario
            $templateProcessor->setValue("actividad#$index", $formulario->actividad);
            $templateProcessor->setValue("nivel_operativo#$index", $formulario->nivel_operativo);
            $templateProcessor->setValue("nivel_financiero#$index", $formulario->nivel_financiero);
            $templateProcessor->setValue("escala#$index", $formulario->escala);
            $templateProcessor->setValue("valor_inherente#$index", $formulario->valor_inherente);
            $templateProcessor->setValue("rto_days#$index", $formulario->rto_days);
            $templateProcessor->setValue("nombre_usuario#$index", $nombreUsuario);
            $templateProcessor->setValue("fecha_creacion#$index", $fechaCreacion);
        }

        // Guardar el documento llenado en una nueva ruta
        $newFilePath = public_path('descargas/formulario_completo.docx');
        $templateProcessor->saveAs($newFilePath);

        // Descargar el documento generado
        return response()->download($newFilePath);
    }
}
