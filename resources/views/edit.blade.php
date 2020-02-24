@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 center-align">
            <h1 class="subtitle">Editar Empleado</h1>
            <form action="/empleado/{{$empleado->id}}" method="post" class="left-align form-examen">
                @csrf
                @method('PUT')
                <div>
                    <label for="">Activo</label>
                    <input type="checkbox" name="activo" {{ $empleado->activo ? 'checked' : '' }}>
                    @error('activo')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Código</label>
                    <input type="text" name="codigo" disabled value="{{ $empleado->codigo }}" class="{{ $errors->has('codigo') ? 'error' : '' }}">
                    @error('codigo')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="{{ $empleado->nombre }}" class="{{ $errors->has('nombre') ? 'error' : '' }}">
                    @error('nombre')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Salario Dolares</label>
                    <input type="text" name="salarioDolares" value="{{ $empleado->salarioDolares }}" class="{{ $errors->has('salarioDolares') ? 'error' : '' }}">
                    @error('salarioDolares')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Salario Pesos</label>
                    <input type="text" name="salarioPesos" value="{{ $empleado->salarioPesos }}" class="{{ $errors->has('salarioPesos') ? 'error' : '' }}" disabled>
                    @error('salarioPesos')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Direccion</label>
                    <input type="text" name="direccion" value="{{ $empleado->direccion }}" class="{{ $errors->has('direccion') ? 'error' : '' }}">
                    @error('direccion')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Estado</label>
                    <input type="text" name="estado" value="{{ $empleado->estado }}" class="{{ $errors->has('estado') ? 'error' : '' }}">
                    @error('estado')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Ciudad</label>
                    <input type="text" name="ciudad" value="{{ $empleado->ciudad }}" class="{{ $errors->has('ciudad') ? 'error' : '' }}">
                    @error('ciudad')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Telefono</label>
                    <input type="text" name="telefono" value="{{ $empleado->telefono }}" class="{{ $errors->has('telefono') ? 'error' : '' }}">
                    @error('telefono')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Correo</label>
                    <input type="text" name="correo" value="{{ $empleado->correo }}" class="{{ $errors->has('correo') ? 'error' : '' }}">
                    @error('correo')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div></div>
                <div class="right-align">
                    <a href="{{ route('home') }}" class="btn grey">Back</a>
                    <button class="btn" type="submit">Editar</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
@endsection
