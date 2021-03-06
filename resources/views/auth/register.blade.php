@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrarse</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <label for="nombre" class="col-md-4 control-label">Nombre</label>
                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>
                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                                <label for="apellido" class="col-md-4 control-label">Apellido</label>
                                <div class="col-md-6">
                                    <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" required autofocus>
                                    @if ($errors->has('apellido'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                                <label for="cedula" class="col-md-4 control-label">Cedula</label>
                                <div class="col-md-6">
                                    <input id="cedula" type="text" class="form-control" name="cedula" value="{{ old('cedula') }}" required autofocus>
                                    @if ($errors->has('cedula'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cedula') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('fecha_de_nacimiento') ? ' has-error' : '' }}">
                                <label for="fecha_de_nacimiento" class="col-md-4 control-label">Fecha de nacimiento</label>
                                <div class="col-md-6">
                                    <input id="fecha_de_nacimiento" type="text" class="form-control" name="fecha_de_nacimiento" value="{{ old('fecha_de_nacimiento') }}" autofocus>
                                    @if ($errors->has('fecha_de_nacimiento'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fecha_de_nacimiento') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('edad') ? ' has-error' : '' }}">
                                <label for="edad" class="col-md-4 control-label">Edad</label>
                                <div class="col-md-6">
                                    <input id="edad" type="text" class="form-control" name="edad" value="{{ old('edad') }}" autofocus>
                                    @if ($errors->has('edad'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('edad') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
                                <label for="sexo" class="col-md-4 control-label">Sexo</label>
                                <div class="col-md-6">
                                    <input id="sexo" type="text" class="form-control" name="sexo" value="{{ old('sexo') }}" autofocus>
                                    @if ($errors->has('sexo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <label for="telefono" class="col-md-4 control-label">Telefono</label>
                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" autofocus>
                                    @if ($errors->has('telefono'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                                <label for="celular" class="col-md-4 control-label">Celular</label>
                                <div class="col-md-6">
                                    <input id="celular" type="text" class="form-control" name="celular" value="{{ old('celular') }}" autofocus>
                                    @if ($errors->has('celular'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                               <label for="direccion" class="col-md-4 control-label">Direccion</label>
                               <div class="col-md-6">
                                   <textarea name="direccion" id="direccion" cols="30" rows="5"
                                             class="form-control">{{ old('direccion') }}</textarea>

                                   @if ($errors->has('direccion'))
                                       <span class="help-block">
                                       <strong>{{ $errors->first('direccion') }}</strong>
                                   </span>
                                   @endif
                               </div>
                           </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Contraseña</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required autofocus>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autofocus>
                                </div>
                            </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
