@extends('Inicio2')
@section('contenido1')
<div class="row">
    <div class="col-10">
        <h3>Apertuda de Materias</h3>
    </div>
    <div class="col-2">
        {{-- {!!dd(request()->all())!!} --}}
        {{session("idPeriodo")}}
        {{session('idCarrera')}}
        <form action="{{route('MateriasA.index')}}" method="get">
            <select name="idPeriodo" id="idPeriodo" onchange="this.form.submit()">
                <option value="-1">Seleccione el periodo</option>
                @foreach ($periodos as $periodo )
                <option value="{{$periodo->idPeriodo}}" @if($periodo->idPeriodo == session('idPeriodo'))
                    {{ "selected" }}
                    @endif
                    >{{$periodo->idPeriodo}} {{ $periodo->idPeriodo }}</option>
                @endforeach

            </select><br>
            <select name="idCarrera" id="idCarrera" onchange="this.form.submit()">
                <option value="-1">Seleccione la carrera</option>
                @foreach ($carreras as $carr )
                <option value="{{$carr->idCarrera}}" @if($carr->idCarrera == session('idCarrera'))
                    {{ "selected" }}
                    @endif
                    >{{$carr->idCarrera}} {{$carr->nombreCarrera }}</option>
                @endforeach
            </select>
        </form>
    </div>
</div>
<div class="row">
    <div class="col">
        <form action="{{route('MateriasA.store')}}" method="post">
            @csrf
            <input type="hidden" name="eliminar" id="eliminar" value="NOELIMINAR">
            <button>Sem 1</button><br>
            @if($carrera->count() and session('idPeriodo') != "-1")
            @foreach ( $carrera[0]->reticulas[0]->materias as $materia )
            <input type="checkbox" 
                    name="m{{$materia->idMateria}}" 
                    value="{{$materia->idMateria}}" 
                    onchange="enviar(this)"
                    @if ( $ma->firstWhere('idMateria',$materia['idMateria']))
                        {{"checked"}}
                    @endif>
            {{$materia->id}}
            {{$materia->nombrecorto}}<br>
            @endforeach
            @endif
        </form>
    </div>
</div>
<script>

    function enviar(chbox){
        if (!chbox.checked){
            document.getElementById('eliminar').value = chbox.value;
        }
        chbox.form.submit();    
        }
</script>
@endsection
   