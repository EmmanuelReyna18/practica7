<style>
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        display: flex;
        flex-direction: column;
        
    }

    body {
        min-height: 100vh;
    }

    form {
        padding: 0px;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        /* border: 2px solid red; */
    }
    /* Reducir el espacio entre los form-groups pequeños */
    .form-group-small {
        max-width: 300px; /* Limitar el ancho */
        margin: 0 10px; /* Reducir el margen horizontal */
        padding: 5px; /* Reducir el espacio interior */
        flex: 1; /* Permitir que se ajusten en una fila */
    }

    /* Opcional: Estilo adicional para el contenedor de los grupos pequeños */
    .form-row-small {
        display: flex;
        flex-wrap: wrap;
        gap: 5px; /* Espacio mínimo entre los elementos */
        justify-content: flex-start; /* Alineación a la izquierda */
    }


    .content {
        width: 100%;
        max-width: 100%; /* Limita el ancho máximo del formulario */
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        /* border: 2px solid orange; */
        
        margin: 0 auto; /* Centra el formulario */
    }

    .form-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
        width: 100%;
        /* border: 2px solid blue; */
    }
    .form-group-wide {
    flex: 2; /* Prioridad mayor para que ocupe más espacio */
    max-width: 50%; /* Asegura que ocupe todo el espacio restante */
    margin-top: 20px; /* Separación superior */
    }


    .form-group-wide table {
        width: 370px; /* La tabla ocupa todo el ancho del contenedor */
        border-collapse: collapse; /* Elimina bordes dobles entre celdas */
    }

    .form-group-wide th, .form-group-wide td {
        padding: 12px; /* Espaciado interno en las celdas */
        text-align: center; /* Centra el texto en las celdas */
        border: 1px solid #ccc; /* Bordes para las celdas */
        width: 200px;
    }


    .form-row {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        justify-content: space-between;
        /* border: 2px solid green; */
    }

    .form-group {
        flex: 1;
        min-width: 160px;
        /* border: 2px solid yellow; */
    }

    .form-selects {
        display: flex;
        flex-direction: column;
        gap: 10px;
        flex: 1;
        min-width: 180px;
        
    }

    input[type="text"], input[type="date"], select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: inset 1px 1px 5px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    input[type="text"]:focus, input[type="date"]:focus, select:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        outline: none;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
        width: fit-content;
        align-self: center;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    #fecha {
        max-width: 314px;
        
    }

    #additionalFields {
        width: 100%;
        gap: 15px;
    }

    /* Ocultar los campos de radio por defecto */
    .personal, .lugar {
        display: none;
    }
</style>
@extends('plantillas/plantilla2')

@section('contenido1')

    @include('Grupos/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
   {{$error}}
  </div>
@endforeach
@endif

    @if ($accion=='C')
    <form id="myForm" action="{{route('Grupos.store')}}" method="POST">
    <h1>Asignacion de Grupos</h1>
    @elseif ($accion=='E')
    <form action="{{route('Grupos.update',$grupo->idGrupo)}}" method="POST">
    <h1>Editar</h1>
    @endif

    @if ($accion=='D')
    <form action="{{route('Grupos.eliminar', $grupo)}}" method="POST">
    <h1>Ver y Eliminar</h1>
    @endif

    @csrf
    <div class="content">
        
        <div class="row">
            <div class="col-12">
                <div class="form-container">
                   

                    <div class="form-row">
                        <div class="form-group">

                            <div class="form-group" id="fecha">
                                <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha') }}">
                        @error('fecha')
                            <p class="text-danger">Error en: {{$message}}</p>
                        @enderror
                            </div>
                            <label for="grupo">Grupo</label>
                            <input type="text" class="form-control" id="grupo" name="grupo" value="{{ old('grupo') }}">
                            @error('grupo')
                            <p class="text-danger">Error en: {{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="maxAlumnos">Max. Alumnos</label>
                            <input type="text" class="form-control" id="maxAlumnos" name="maxAlumnos" value="{{ old('maxAlumnos') }}">

                            @error('maxAlumnos')
                            <p class="text-danger">Error en: {{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}">
                            @error('descripcion')
                            <p class="text-danger">Error en: {{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-selects">
                            <div class="form-group">
                                <label for="idPeriodo">Periodo</label>
                                <select id="idPeriodo" name="idPeriodo" class="form-control">
                                    <option value="">Seleccionar Periodo</option>
                                    @foreach($periodos as $periodo)
                                        <option value="{{ $periodo->idPeriodo }}" {{ old('idPeriodo') == $periodo->idPeriodo ? 'selected' : '' }}>
                                            {{ $periodo->periodo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="idMateria">Carrera</label>
                                <select id="idCarrera" name="idCarrera" class="form-control">
                                    <option value="">Seleccionar Carrera</option>
                                    @foreach($carreras as $carrera)
                                        <option value="{{ $carrera->idCarrera }}" {{ old('idCarrera') == $carrera->idCarrera ? 'selected' : '' }}>
                                            {{ $carrera->nombreCarrera }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" id="toggleHorarioButton" onclick="toggleHorario()">
                                    Iniciar Horario
                                </button>
                            </div>
                        </div>
                    </div>

                
                    <div class="form-row" id="additionalFields" style="display: none;">
                        <div class="form-row-small">
                            <!-- Semestre -->
                            <div class="form-group form-group-small">
                                <label for="semestre">Semestre</label>
                                <select id="semestre" name="semestre" class="form-control">
                                    <option value="">Seleccione un Semestre</option>
                                    @for ($i = 1; $i <= 9; $i++)
                                    <option value="semestre {{ $i }}">Semestre {{ $i }}</option>
                                   
                                    @endfor
                                    <!-- Más opciones de semestre aquí -->
                                </select>
                                <div id="materiaContainer">
            @foreach($materias as $materia)
                <label class="materia-option" data-semestre="{{ $materia->semestre }}" style="display: none;">
                    <input type="radio" name="idMateria" value="{{ $materia->idMateria }}"> 
                    {{ $materia->nombreMateria }}
                </label>
            @endforeach
                            </div>
                        </div>
                 
                    
               

                        <div class="form-group form-group-small">
                            <label for="departamento">Departamento</label>    
                            <select id="departamento" name="departamento" class="form-control">
                                <option value="">Seleccionar Departamento</option>
                                @foreach($deptos as $depto)
                                    <option value="{{ $depto->idDepto }}">{{ $depto->nombreDepto }}</option>
                                @endforeach
                            </select>
                        
                            <div id="personalContainer">
                                @foreach($personales as $personal)
                                <label class="personal" data-depto-id="{{ $personal->idDepto }}">
                                    <input type="radio" name="idPersonal" value="{{ $personal->idPersonal }}"> 
                                    {{ $personal->nombre }} {{ $personal->apellidoP }} {{ $personal->apellidoM }}
                                </label>
                            @endforeach
                            </div>
                        </div>
                        
                        <div id="edificioYHorario" style="display: none; margin-top: 20px;">
                            <div style="display: flex; align-items: flex-start; gap: 20px;">
                    <div class="form-row">
                        <!-- Edificio -->
                        <div class="form-group">
                            <label for="edificio">Edificio</label>
                            <select id="edificio" name="edificio" class="form-control">
                                <option value="">Seleccionar edificio</option>
                                @foreach($edificios as $edificio)
                                    <option value="{{ $edificio->idEdificio }}">{{ $edificio->nombreEdificio }}</option>
                                @endforeach
                            </select>
                    
                            <div id="lugarContainer">
                                @foreach($lugares as $lugar)
                                <label class="lugar" data-edificio-id="{{ $lugar->idEdificio }}" style="display: none;">
                                    <input type="radio" name="idLugar" data-nombre-corto="{{ $lugar->nombreCorto }}" value="{{ $lugar->idLugar }}">
                                    {{ $lugar->nombreLugar }}
                                </label>
                                
                                @endforeach
                            </div>
                        </div>
                    
                        <!-- Tabla de horarios -->
                        <div class="form-group form-group-wide">
                            <table>
                                <thead>
                                    <tr>
                                         <th></th>
                                        <th>L</th>
                                        <th>M</th>
                                        <th>X</th>
                                        <th>J</th>
                                        <th>V</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 7; $i <= 21; $i++)
                                        <tr>
                                            <td>{{ $i }}-{{ $i + 1 }}</td>
                                            <td><input type="checkbox" name="horarios[]" value="L,{{ $i }}"></td>
                                            <td><input type="checkbox" name="horarios[]" value="M,{{ $i }}"></td>
                                            <td><input type="checkbox" name="horarios[]" value="X,{{ $i }}"></td>
                                            <td><input type="checkbox" name="horarios[]" value="J,{{ $i }}"></td>
                                            <td><input type="checkbox" name="horarios[]" value="V,{{ $i }}"></td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>             
                    
            </div>
            
            </div>
            <div class="form-group">
   
    @error('idMateria')
        <p class="text-danger">Error en: {{ $message }}</p>
    @enderror
</div>

        </div>
    </div>

    </form>

    <form id="myForm2" action="{{ $accion == 'E' ? route('Grupos.update', $grupo->idGrupo) : route('Grupos.store') }}">
        @csrf
        <div class="content">
             <div id="edificioYHorario" style="display: none; margin-top: 20px;">
                        <div style="display: flex; align-items: flex-start; gap: 20px;">
            <!-- Columna izquierda: Select de edificio y radios -->
            <div style="min-width: 250px;">
                <div class="form-group">
                    <label for="edificio">Edificio</label>
                    <select id="edificio" name="edificio" class="form-control">
                        <option value="">Seleccionar edificio</option>
                        @foreach($edificios as $edificio)
                            <option value="{{ $edificio->idEdificio }}">{{ $edificio->nombreEdificio }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="lugarContainer" style="margin-top: 10px;">
                    @foreach($lugares as $lugar)
                        <label class="lugar" data-edificio-id="{{ $lugar->idEdificio }}" style="display: none; margin-top: 5px;">
                            <input type="radio" name="idLugar" data-nombre-corto="{{ $lugar->nombreCorto }}" value="{{ $lugar->idLugar }}">
                            {{ $lugar->nombreLugar }}
                        </label>
                    @endforeach
                </div>
            </div>
    
            <!-- Columna derecha: Tabla de horarios -->
            <div style="flex: 1;">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr style="background-color: black; color: white;">
                            <th>Hora</th>
                            <th>L</th>
                            <th>M</th>
                            <th>X</th>
                            <th>J</th>
                            <th>V</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 7; $i <= 21; $i++)
                            <tr>
                                <td>{{ $i }}-{{ $i + 1 }}</td>
                                <td><input type="checkbox" name="horarios[]" value="L,{{ $i }}"></td>
                                <td><input type="checkbox" name="horarios[]" value="M,{{ $i }}"></td>
                                <td><input type="checkbox" name="horarios[]" value="X,{{ $i }}"></td>
                                <td><input type="checkbox" name="horarios[]" value="J,{{ $i }}"></td>
                                <td><input type="checkbox" name="horarios[]" value="V,{{ $i }}"></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
                    </div>
                         </div>
                    
                         </div>
                        </div>
                         </div>
        </form>
    

    <!-- JavaScript para mostrar campos adicionales -->
    <script>
        

        document.querySelectorAll('input[name="horarios[]"]').forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        // Obtener el valor seleccionado del checkbox
        const value = checkbox.value; 
        const [dia, hora] = value.split(',');

        // Verificar si hay un lugar seleccionado
        const lugarSeleccionado = document.querySelector('input[name="idLugar"]:checked');
        const nombreCorto = lugarSeleccionado ? lugarSeleccionado.getAttribute('data-nombre-corto') : '';

        // Buscar si ya existe una descripción junto al checkbox
        let descriptionContainer = checkbox.parentElement.querySelector('.description');

        if (checkbox.checked) {
            if (!lugarSeleccionado) {
                alert("Por favor, seleccione un lugar antes de elegir un horario.");
                checkbox.checked = false; // Desmarcar el checkbox
                return;
            }

            // Crear el contenedor de la descripción si no existe
            if (!descriptionContainer) {
                descriptionContainer = document.createElement('div');
                descriptionContainer.classList.add('description');
                checkbox.parentElement.appendChild(descriptionContainer);
            }

            // Actualizar el contenido del contenedor con el lugar, día y hora
            descriptionContainer.innerText = `${nombreCorto}, ${dia}, ${hora}`;
        } else {
            // Eliminar la descripción si el checkbox es desmarcado
            if (descriptionContainer) {
                checkbox.parentElement.removeChild(descriptionContainer);
            }
        }
    });
});


        document.addEventListener("DOMContentLoaded", function() {
        // Mostrar los campos adicionales cuando se seleccionan ambos campos (idPeriodo y idCarrera)
        const idPeriodoSelect = document.getElementById("idPeriodo");
        const idCarreraSelect = document.getElementById("idCarrera");
        const additionalFields = document.getElementById("additionalFields");
    
        function checkSelections() {
            if (idPeriodoSelect.value !== "" && idCarreraSelect.value !== "") {
                additionalFields.style.display = "flex";
            } else {
                additionalFields.style.display = "none";
            }
        }
    
        idPeriodoSelect.addEventListener("change", checkSelections);
        idCarreraSelect.addEventListener("change", checkSelections);
    
        // Filtrar el personal por el departamento seleccionado
        const departamentoSelect = document.getElementById("departamento");
        const personalContainer = document.getElementById("personalContainer");
        const personals = personalContainer.getElementsByClassName("personal");
    
        departamentoSelect.addEventListener("change", function() {
            const selectedDepto = departamentoSelect.value;
    
            Array.from(personals).forEach(personal => {
                if (selectedDepto === "" || personal.getAttribute("data-depto-id") === selectedDepto) {
                    personal.style.display = "block";
                } else {
                    personal.style.display = "none";
                }
            });
        });
    
        // Filtrar lugares según el edificio seleccionado
        const edificioSelect = document.getElementById("edificio");
        const lugarContainer = document.getElementById("lugarContainer");
        const lugares = lugarContainer.getElementsByClassName("lugar");
    
        edificioSelect.addEventListener("change", function() {
            const selectedEdificio = edificioSelect.value;
    
            Array.from(lugares).forEach(lugar => {
                if (selectedEdificio === "" || lugar.getAttribute("data-edificio-id") === selectedEdificio) {
                    lugar.style.display = "block";
                } else {
                    lugar.style.display = "none";
                }
            });
        });
    
        // Mostrar materias basadas en el semestre seleccionado
        const semestreSelect = document.getElementById("semestre");
        const materiaContainer = document.getElementById("materiaContainer");
        const materiaOptions = materiaContainer.getElementsByClassName("materia-option");
    
        semestreSelect.addEventListener("change", function() {
            const selectedSemestre = semestreSelect.value;
    
            Array.from(materiaOptions).forEach(materia => {
                if (selectedSemestre === "" || materia.getAttribute("data-semestre") === selectedSemestre) {
                    materia.style.display = "block";
                } else {
                    materia.style.display = "none";
                }
            });
        });
    
        // Mostrar información de lugar, día y hora cuando se selecciona un checkbox en la tabla de horarios
        const horariosCheckboxes = document.querySelectorAll('input[name="horarios[]"]');
    
        horariosCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const value = checkbox.value;
                const [dia, hora] = value.split(',');
    
                const lugarSeleccionado = document.querySelector('input[name="idLugar"]:checked');
                const nombreCorto = lugarSeleccionado ? lugarSeleccionado.getAttribute('data-nombre-corto') : '';
    
                let descriptionContainer = checkbox.parentElement.querySelector('.description');
    
                if (checkbox.checked) {
                    if (!descriptionContainer) {
                        descriptionContainer = document.createElement('div');
                        descriptionContainer.classList.add('description');
                        descriptionContainer.innerText = `${nombreCorto}, ${dia}, ${hora}`;
                        checkbox.parentElement.appendChild(descriptionContainer);
                    }
                } else {
                    if (descriptionContainer) {
                        checkbox.parentElement.removeChild(descriptionContainer);
                    }
                }
            });
        });
    
        
    });
    
    function toggleHorario() {
    const edificioYHorario = document.getElementById("edificioYHorario");
    const toggleButton = document.getElementById("toggleHorarioButton");
    const form = document.getElementById("myForm");

    if (edificioYHorario.style.display === "none") {
        // Mostrar el bloque de horarios
        edificioYHorario.style.display = "block";
        toggleButton.textContent = "Terminar Horario";
        toggleButton.type = "submit";

        // Deshabilitar los campos no relacionados con el horario
        document.getElementById("grupo").disabled = true;
        document.getElementById("descripcion").disabled = true;
        document.getElementById("maxAlumnos").disabled = true;
        document.getElementById("idPeriodo").disabled = true;
        document.getElementById("idCarrera").disabled = true;
        document.getElementById("departamento").disabled = true;
        document.getElementById("semestre").disabled = true;
        document.querySelectorAll('input[name="idMateria"]').forEach((radio) => (radio.disabled = true));
        document.querySelectorAll('input[name="idPersonal"]').forEach((radio) => (radio.disabled = true));

        // Habilitar los campos de horario y lugar
        document.getElementById("edificio").disabled = false;
        document.querySelectorAll('input[name="idLugar"]').forEach((radio) => (radio.disabled = false));
        document.querySelectorAll('input[name="horarios[]"]').forEach((checkbox) => (checkbox.disabled = false));
    } else {
        // Si el botón es "Terminar Horario", habilitar todos los campos para enviar el formulario
        if (toggleButton.textContent === "Terminar Horario") {
            // Habilitar todos los campos deshabilitados antes de enviar
            document.getElementById("grupo").disabled = false;
            document.getElementById("descripcion").disabled = false;
            document.getElementById("maxAlumnos").disabled = false;
            document.getElementById("idPeriodo").disabled = false;
            document.getElementById("idCarrera").disabled = false;
            document.getElementById("departamento").disabled = false;
            document.getElementById("semestre").disabled = false;
            document.querySelectorAll('input[name="idMateria"]').forEach((radio) => (radio.disabled = false));
            document.querySelectorAll('input[name="idPersonal"]').forEach((radio) => (radio.disabled = false));

            form.submit(); // Enviar el formulario
        } else {
            // Cambiar tipo de botón para no enviar formulario
            toggleButton.textContent = "Iniciar Horario";
            toggleButton.type = "button";

            // Ocultar los campos de horario
            edificioYHorario.style.display = "none";

            // Reactivar los campos originales de grupo
            document.getElementById("grupo").disabled = false;
            document.getElementById("descripcion").disabled = false;
            document.getElementById("maxAlumnos").disabled = false;
            document.getElementById("idPeriodo").disabled = false;
            document.getElementById("idCarrera").disabled = false;
            document.getElementById("departamento").disabled = false;
            document.getElementById("semestre").disabled = false;

            // Deshabilitar los campos de horario
            document.getElementById("edificio").disabled = true;
            document.querySelectorAll('input[name="idLugar"]').forEach((radio) => (radio.disabled = true));
            document.querySelectorAll('input[name="horarios[]"]').forEach((checkbox) => (checkbox.disabled = true));
        }
    }
}


    
    // Función para prevenir la recarga y controlar el envío del formulario
    function preventFormSubmit(event) {
        event.preventDefault(); // Prevenir el comportamiento por defecto de envío del formulario
    }
    
    // Función que maneja el cambio entre "Iniciar Horario" y "Terminar Horario"
   
    
    // Asignar preventFormSubmit a todos los formularios de la página
    document.querySelectorAll("form").forEach((form) => {
        form.addEventListener("submit", preventFormSubmit);
    });
    
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const nuevoButton = document.getElementById("nuevo");
            nuevoButton.style.display = "none"; // Oculta el botón al cargar la página
        });
    </script>
    
    
        @endsection
