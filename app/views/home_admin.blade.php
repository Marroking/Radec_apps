<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/style.css') }}
    {{ HTML::script('js/bootstrap.js') }}
    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:700);
    </style>
</head>
<body>
    <div class="container">
        <div class="row clearfix">
            <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
                <div class="col-md-6 column">
                    <div class="navbar-header">
                        {{ HTML::image('images/radec_logo.jpg', "Imagen no encontrada", array('id' => 'radec_logo', 'title' => 'RADEC S.A de C.V')) }}
                    </div>
                        <ul class="nav navbar-nav" style="margin-top:10px;">
                            <li>
                                <a href="#">Traspasos</a>
                            </li>
                            <li>
                                <a href="#">Negados</a>
                            </li>
                            <li>
                                <a href="#">Aseguradoras</a>
                            </li>
                        </ul>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="col-md-3 column">
                        <h3 class="text-center" id="radec_title">
                            APLICACIONES RADEC
                        </h3>
                    </div>
                    <div class="col-md-3 column">
                        <ul class="nav navbar-nav navbar-right" style="margin-top:10px;">
                            <li>
                                {{ HTML::link('logout', 'Cerrar Sesión') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <h1>Admin Page</h1>
    <div class="welcome">
        Bienvenido {{ Auth::user()->username; }}
        <h3>Has iniciado sesión correctamente.</h3>
    </div>
</body>
</html>