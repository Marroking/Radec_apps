<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title> Guardar usuario </title>
 </head>
 <body>
  @if(isset($errors))
     <ul>
        @foreach($errors as $item)
           <li> {{ $item }} </li>
        @endforeach
     </ul>
  @endif
    <h1> Guardar usuario </h1>
    {{ Form::open(array('url' => 'users/' . $user->id)) }}
      {{ Form::label ('id_collaborator', 'Número de Colaborador') }}
       <br />
       {{ Form::text ('id_collaborator', $user->id_collaborator) }}
       <br />
       {{ Form::label ('full_name', 'Nombre Completo') }}
       <br />
       {{ Form::text ('full_name', $user->full_name) }}
       <br />
       {{ Form::label ('username', 'Nombre de Usuario') }}
       <br />
       {{ Form::text ('username', $user->username) }}
       <br />
       {{ Form::label ('email', 'Email') }}
       <br />
       {{ Form::text ('email', $user->email) }} 
       <br /> 
       @if($user->id)
          {{ Form::hidden ('_method', 'PUT') }}
       @else
          {{ Form::label ('password', 'Contraseña') }}
          <br />
          {{ Form::password ('password') }}
          <br />
       @endif
       {{ Form::submit('Guardar usuario') }}
       {{ link_to('users', 'Cancelar') }}
    {{ Form::close() }}
 </body>
</html>