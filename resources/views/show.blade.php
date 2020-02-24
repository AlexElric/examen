@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 center-align">
            <h1 class="subtitle">Ver Empleado</h1>
            <form action="{{ route('empleado.store') }}" method="post" class="left-align form-examen">
                @csrf
                <div>
                    <label for="">Activo</label>
                    <input type="checkbox" name="activo" {{ $empleado->activo ? 'checked' : '' }}>
                    @error('activo')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Código</label>
                    <input type="text" name="codigo" value="{{ $empleado->codigo }}" disabled class="{{ $errors->has('codigo') ? 'error' : '' }}">
                    @error('codigo')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="{{ $empleado->nombre }}" disabled class="{{ $errors->has('nombre') ? 'error' : '' }}">
                    @error('nombre')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Salario Dolares</label>
                    <input type="text" name="salarioDolares" value="{{ $empleado->salarioDolares }}" disabled class="{{ $errors->has('salarioDolares') ? 'error' : '' }}">
                    @error('salarioDolares')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Salario Pesos</label>
                    <input type="text" name="salarioPesos" value="{{ $empleado->salarioPesos }}" disabled class="{{ $errors->has('salarioPesos') ? 'error' : '' }}">
                    @error('salarioPesos')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Direccion</label>
                    <input type="text" name="direccion" value="{{ $empleado->direccion }}" disabled class="{{ $errors->has('direccion') ? 'error' : '' }}">
                    @error('direccion')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Estado</label>
                    <input type="text" name="estado" value="{{ $empleado->estado }}" disabled class="{{ $errors->has('estado') ? 'error' : '' }}">
                    @error('estado')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Ciudad</label>
                    <input type="text" name="ciudad" value="{{ $empleado->ciudad }}" disabled class="{{ $errors->has('ciudad') ? 'error' : '' }}">
                    @error('ciudad')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Telefono</label>
                    <input type="text" name="telefono" value="{{ $empleado->telefono }}" disabled class="{{ $errors->has('telefono') ? 'error' : '' }}">
                    @error('telefono')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Correo</label>
                    <input type="text" name="correo" value="{{ $empleado->correo }}" disabled class="{{ $errors->has('correo') ? 'error' : '' }}">
                    @error('correo')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
            </form>
            <h4 class="">Proyeccion Salarial</h4>
            <table>
                <thead>
                    <tr>
                        <th>Mes</th>
                        <th>Salario Dolares</th>
                        <th>Salario Pesos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyeccion as $item)
                        <tr>
                            <th>{{$loop->index +1}}</th>
                            <th>{{$item['sd']}}</th>
                            <th>{{$item['sp']}}</th>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <div class="right-align dos-arriba">
                    <a href="{{ route('home') }}" class="btn">Back</a>
                </div>
        </div>
    </div>
</div>
@endsection
