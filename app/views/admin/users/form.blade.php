@extends ('admin/layout')
<?php
  if ($user->exists):
      $form_data = array('route' => array('admin.users.update', $user->id), 'method' => 'PATCH');
      $action    = 'Editar';
  else:
      $form_data = array('route' => 'admin.users.store', 'method' => 'POST');
      $action    = 'Crear';        
  endif;
?>
@section ('content')

  <h1>{{ $action }} Usuarios</h1>
  @if ($action == 'Editar')  
    {{ Form::model($user, array('route' => array('admin.users.destroy', $user->id), 'method' => 'DELETE', 'role' => 'form')) }}
      <div class="row">
        <div class="form-group col-md-4">
            {{ Form::submit('Eliminar usuario', array('class' => 'btn btn-danger')) }}
        </div>
      </div>
    {{ Form::close() }}
  @endif  
  <p>
    <a href="{{ route('admin.users.index') }}" class="btn btn-info">Lista de usuarios</a>
  </p>  <h1 style="text-align:center;">Crear Usuarios</h1>

  @include ('admin/errors', array('errors' => $errors))

  {{ Form::model($user, array('route' => 'admin.users.store', 'method' => 'POST'), array('role' => 'form')) }}
    <div class="row">
      <div class="form-group col-md-4 col-md-offset-2">
        {{ Form::label('id_collaborator', 'Numero de colaborador') }}
        {{ Form::text('id_collaborator', null, array('placeholder' => 'Introduce el numero de colalborador', 'class' => 'form-control')) }}
      </div>
      <div class="form-group col-md-4">
        {{ Form::label('full_name', 'Nombre completo') }}
        {{ Form::text('full_name', null, array('placeholder' => 'Introduce el nombre y apellido', 'class' => 'form-control')) }}  
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-4 col-md-offset-2">
        {{ Form::label('username', 'Nombre de usuario') }}
        {{ Form::text('username', null, array('placeholder' => 'Introduce el nombre de usuario', 'class' => 'form-control')) }}              
      </div>
      <div class="form-group col-md-4">
        {{ Form::label('email', 'Dirección de E-mail') }}
        {{ Form::text('email', null, array('placeholder' => 'Introduce el E-mail', 'class' => 'form-control')) }}
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-4 col-md-offset-2">
        {{ Form::label('password', 'Contraseña') }}
        {{ Form::password('password', array('class' => 'form-control')) }}
      </div>
      <div class="form-group col-md-4">
        {{ Form::label('password_confirmation', 'Confirmar contraseña') }}
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
      </div>
    </div>
    {{ Form::button('Crear usuario', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  {{ Form::close() }}

@stop

