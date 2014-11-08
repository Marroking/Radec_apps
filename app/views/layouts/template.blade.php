@extends ('layout')

	@section ('title') 
		Saludos a {{ $name }}
	@stop

	@section ('content')

	  <h1>Hello {{ $name }}</h1>

	@stop