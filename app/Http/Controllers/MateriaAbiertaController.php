<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\MateriaAbierta;
use App\Models\Periodo;
use Illuminate\Http\Request;

class MateriaAbiertaController extends Controller

{

    public $carrera;
    public $ma;
    public $idPeriodo;
    public $idCarrera;

    function __construct()
    {
        if (request()->idperiodo) {
            $this->idPeriodo = request()->idperiodo;
            session(['idPeriodo' => request()->idperiodo]);
        } else {
            $this->idPeriodo = (session()->exists('idPeriodo') ? session('idPeriodo') : "-1");
        }
        if (request()->idcarrera) {
            $this->idCarrera = request()->idcarrera;
            session(['idCarrera' => request()->idcarrera]);
        } else {
            $this->idCarrera = (session()->exists('idCarrera') ? session('idCarrera') : "-1");
        }
        $this->carrera = Carrera::with("reticulas.materias")->where('id', $this->idCarrera)->get();
        $this->ma = MateriaAbierta::where('idPeriodo', $this->idPeriodo)

            ->where('idCarrera', $this->idCarrera)

            ->get();
    }


    public function index()
    {
        $carreras = Carrera::get(); //para el select
        $periodos = Periodo::get(); //para el select
        return view("MateriaAbierta/index",
                                            [
                                            'carreras' => $carreras,
                                            'periodos' => $periodos,
                                            'carrera' => $this->carrera,
                                            // 'ma' => $this->ma
                                            ]
                                        );
    }


    public function create()

    {

    }


    public function store(Request $request)

    {
        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 1) == 'm') {
                $existe = $this->ma->firstWhere('idMateria', $request->$key);
                if ( $this->idPeriodo != "-1" and $this->idCarrera != "-1") {
                    MateriaAbierta::create([
                        'idPeriodo' => $this->idPeriodo,
                        'idCarrera' => $this->idCarrera,
                        'idMateria' => $value
                    ]);
                }
            }

            if (request()->eliminar and request()->eliminar != "NOELIMINAR") {
                $existe = $this->ma->firstWhere('idMateria', $request->eliminar);
                $existe->delete();
                return redirect()->route('MateriasA.index');
            }
        }

        return redirect()->route('MateriasA.index');
    }


    public function show(MateriaAbierta $MateriaAbierta)

    {

    }

    public function edit(MateriaAbierta $MateriaAbierta)

    {
    
    }


    /**

     * Update the specified resource in storage.

     */

    public function update(Request $request, MateriaAbierta $MateriaAbierta)

    {

        //

    }


    /**

     * Remove the specified resource from storage.

     */

    public function destroy(MateriaAbierta $MateriaAbierta)

    {

        $MateriaAbierta->delete();

        return "aqui voy";

        return redirect()->route('MateriasA.index');
    }
}
