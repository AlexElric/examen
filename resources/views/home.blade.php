@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 center-align">
            <h1 class="subtitle">Empleados</h1>
            @if ($empleados)
                <table>
                    <thead>
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <th>Status</th>
                        <th>Acciones</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                            <tr>
                                <th>{{$empleado->nombre}}</th>
                                <th>
                                    <form action="{{ route('activar', $empleado->id) }}" id="emp-{{$empleado->id}}" method="POST">
                                        @csrf
                                        <select name="activo" form-id="emp-{{$empleado->id}}" default class="default action-select">
                                            <option value="1" @if ($empleado->activo){{'selected'}}@endif>Activo</option>
                                            <option value="0" @if (!$empleado->activo){{'selected'}}@endif>Inactivo</option>
                                        </select>
                                    </form>
                                </th>
                                <th>
                                    <a href="{{ route('empleado.show',$empleado->id) }}">
                                        <button class="btn">Ver</button>
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('empleado.edit',$empleado->id) }}">
                                        <button class="btn">Editar</button>
                                    </a>
                                </th>
                                <th>
                                    <form action="{{ route('empleado.destroy',$empleado->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn red">Eliminar</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        
                    </tbody>                
                </table>
            @endif
            <div class="right-align">
                <a href="{{ route('empleado.create') }}">
                    <button class="btn dos-arriba">Nuevo Empleado</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    if (document.querySelector('.action-select')) {

        var selects = document.querySelectorAll(".action-select");
        selects.forEach(function(element, index) {
            element.addEventListener('change', function(){

                var dlt = this.getAttribute('form-id');

                document.getElementById(dlt).submit();
            
            });
        });
    }
</script>

@endsection

