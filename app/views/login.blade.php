<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
            <script src="https://code.jquery.com/jquery.js"></script>
            {{ HTML::style('css/bootstrap.css') }}
            {{ HTML::style('css/style.css') }}
            {{ HTML::script('js/bootstrap.js') }}
            {{ HTML::script('js/bootstrap.js'); }}
    </head>
    <body>
        <div class="container">
            <div class="row clearfix">
                <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
                    <div class="col-md-4 column">
                        <div class="navbar-header">
                            {{ HTML::image('images/radec_logo.jpg', "Imagen no encontrada", array('id' => 'radec_logo', 'title' => 'RADEC S.A de C.V')) }}
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="col-md-4 column">
                            <h3 class="text-center" id="radec_title">
                                APLICACIONES RADEC
                            </h3>
                        </div>
                        <div class="col-md-4 column">
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container" style="margin-top:100px;">
            <div class="row clearfix">
                <div class="col-md-4 column">
                </div>
                <div class="col-md-4 column">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
                            @if(Session::has('mensaje_error'))
                                <div class="alert alert-danger">{{ Session::get('mensaje_error') }}</div>
                            @endif
                            
                            @if(Session::has('flash_notice'))
                                <div id="flash_notice">{{ Session::get('flash_notice') }} </div>
                                
                            @endif
                            {{ Form::open(array('url' => 'login', 'role' => 'form')) }}
                                <legend>
                                    <h3 class="text-warning text-center">
                                        Iniciar Sesión
                                    </h3>
                                </legend>
                                <div class="form-group">
                                    {{ Form::label('usuario', 'Nombre de usuario') }}
                                    {{ Form::text('username', Input::old('username'), array('class' => 'form-control')); }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('contraseña', 'Contraseña') }}
                                    {{ Form::password('password', array('class' => 'form-control')); }}
                                </div>
                                <div class="form-group">
                                    <label>
                                        {{ Form::checkbox('rememberme', true) }}
                                        Recordar contraseña
                                    </label>
                                </div>
                                <div class="form-group" style="text-align:center">
                                    {{ Form::submit('Acceder', array('class' => 'btn btn-primary')) }}
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4 column">
                </div>
            </div>
        </div>
    </body>
</html>