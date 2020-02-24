@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 center-align">
            <h1 class="subtitle">Crear Empleado</h1>
            <form action="{{ route('empleado.store') }}" method="post" class="left-align form-examen">
                @csrf
                <div class="field-cont field-half">
                    <label>Activo</label>
                    <input type="checkbox" name="active" class="default" default>
                    @error('active')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Código</label>
                    <input type="text" name="codigo" value="{{ old('codigo') }}" class="{{ $errors->has('codigo') ? 'error' : '' }}">
                    @error('codigo')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" class="{{ $errors->has('nombre') ? 'error' : '' }}">
                    @error('nombre')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Salario Dolares</label>
                    <input type="text" name="salarioDolares" value="{{ old('salarioDolares') }}" class="{{ $errors->has('salarioDolares') ? 'error' : '' }}">
                    @error('salarioDolares')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Salario Pesos</label>
                    <input type="text" name="salarioPesos" value="{{ old('salarioPesos') }}" class="{{ $errors->has('salarioPesos') ? 'error' : '' }}" disabled>
                    @error('salarioPesos')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Direccion</label>
                    <input type="text" name="direccion" value="{{ old('direccion') }}" class="{{ $errors->has('direccion') ? 'error' : '' }}">
                    @error('direccion')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Estado</label>
                    <input type="text" name="estado" value="{{ old('estado') }}" class="{{ $errors->has('estado') ? 'error' : '' }}">
                    @error('estado')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Ciudad</label>
                    <input type="text" name="ciudad" value="{{ old('ciudad') }}" class="{{ $errors->has('ciudad') ? 'error' : '' }}">
                    @error('ciudad')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Telefono</label>
                    <input type="text" name="telefono" value="{{ old('telefono') }}" class="{{ $errors->has('telefono') ? 'error' : '' }}">
                    @error('telefono')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div>
                    <label>Correo</label>
                    <input type="text" name="correo" value="{{ old('correo') }}" class="{{ $errors->has('correo') ? 'error' : '' }}">
                    @error('correo')
                        <div class="error-message"><p>{{ $message }}</p></div>
                    @enderror
                </div>
                <div></div>
                <div class="right-align">
                    <button class="btn" type="submit">Crear</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
@endsection
