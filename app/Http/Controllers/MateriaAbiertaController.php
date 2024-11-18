<?php

namespace App\Http\Controllers;
use App\Models\Carrera;
use App\Models\Periodo;
use App\Models\MateriasAbierta;
use Illuminate\Http\Request;

class MateriasAbiertaController extends Controller
{
    
    public $carrera;
    public $ma;
    public $periodo_id;
    public $carrera_id;
    
    function __construct()
    {
        // Obtener el periodo desde la solicitud o la sesión
        if (request()->idPeriodo) {
            $this->periodo_id = request()->idPeriodo;
            session(['idPeriodo' => request()->idPeriodo]);
        } else {
            $this->periodo_id = session('idPeriodo', "-1");
        }
    
        // Obtener la carrera desde la solicitud o la sesión
        if (request()->idCarrera) {
            $this->carrera_id = request()->idCarrera;
            session(['idCarrera' => request()->idCarrera]);
        } else {
            $this->carrera_id = session('idCarrera', "-1");
        }
    
        // Obtener los datos de la carrera seleccionada con sus retículas y materias
        $this->carrera = Carrera::with("reticulas.materias")
            ->where('idCarrera', $this->carrera_id)
            ->get();
    
        // Obtener las materias abiertas de la carrera y periodo seleccionados
        $this->ma = MateriasAbierta::where('idPeriodo', $this->periodo_id)
            ->where('idCarrera', $this->carrera_id)
            ->get();
    }
    
    public function index()
    {
        // Obtener todos los periodos y carreras disponibles
        $periodos = Periodo::get();
        $carreras = Carrera::get();
        return view("materiasa.index", [
            'periodos' => $periodos,
            'carreras' => $carreras,
            'carrera' => $this->carrera,
            'ma' => $this->ma
        ]);
    }
    
    public function store(Request $request)
    {
        // Procesar los checkboxes de materias
        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 1) == 'm') {
                // Verificar si la materia ya está asignada
                $existe = $this->ma->firstWhere('idMateria', $value);
                if (is_null($existe) && $this->periodo_id != "-1" && $this->carrera_id != "-1") {
                    // Si no existe, crear una nueva entrada en 'materias_abiertas'
                    MateriasAbierta::create([
                        'idPeriodo' => $this->periodo_id,
                        'idCarrera' => $this->carrera_id,
                        'idMateria' => $value
                    ]);
                }
            }
        }
    
        // Eliminar la materia si el campo 'eliminar' está configurado
        if ($request->eliminar && $request->eliminar != "NOELIMINAR") {
            MateriasAbierta::where('idMateria', $request->eliminar)
                ->where('idPeriodo', $this->periodo_id)
                ->where('idCarrera', $this->carrera_id)
                ->delete();
            return redirect()->route('materiasa.index');
        }
    
        return redirect()->route('materiasa.index');
    }
    public function show(MateriasAbierta $MateriasAbierta)

    {

    }

    public function edit(MateriasAbierta $MateriasAbierta)

    {
    
    }


    /**

     * Update the specified resource in storage.

     */

    public function update(Request $request, MateriasAbierta $MateriasAbierta)

    {

        //

    }


    /**

     * Remove the specified resource from storage.

     */

    public function destroy(MateriasAbierta $MateriasAbierta)

    {

        $MateriasAbierta->delete();

        return "aqui voy";

        return redirect()->route('MateriasA.index');
    }
}
