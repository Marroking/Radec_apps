  @if ($errors->any())
    <div class="row">
      <div class="form-group col-md-8 col-md-offset-2">
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Por favor corrige los siguentes errores:</strong>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  @endif