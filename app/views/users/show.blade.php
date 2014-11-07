<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Datos de usuario </title>
 </head>
 <body>
    <h1> {{ $user->full_name }} </h1>
    <ul>
       <li> Número de Colaborador: {{ $user->id_collaborator }} </li>
       <li> Nombre Completo: {{ $user->full_name }} </li>
       <li> Nombre de Usuario: {{ $user->usernae }} </li>
       <li> Email: {{ $user->email }} </li>
    </ul>
    <p> {{ link_to('users', 'Volver atrás') }} </p>
 </body>
</html>