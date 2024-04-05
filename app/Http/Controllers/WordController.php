<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\Formulario;

class WordController extends Controller
{
    public function generateWord($id )
    {
        // Obtener el formulario con el ID proporcionado
        $formulario = Formulario::findOrFail($id);

        $templatePath = public_path('documents\bia.docx');

        // Crear un nuevo objeto TemplateProcessor
        $templateProcessor = new TemplateProcessor($templatePath);

        // Llenar la plantilla con los datos del formulario
        $templateProcessor->setValue('actividad', $formulario->actividad);
        $templateProcessor->setValue('nivel_operativo', $formulario->nivel_operativo);
        $templateProcessor->setValue('nivel_financiero', $formulario->nivel_financiero);
        $templateProcessor->setValue('escala', $formulario->escala);
        $templateProcessor->setValue('valor_inherente',$formulario->valor_inherente);
        $templateProcessor->setValue('rto_days',$formulario->rto_days);


        // Guardar el documento llenado en una nueva ruta
        $newFilePath = public_path('descargas\formulario_' . $id . '.docx');
        $templateProcessor->saveAs($newFilePath);

        // Descargar el documento generado
        return response()->download($newFilePath);
    }
}
