@extends('plantillas.master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h2>{{$post->titulo}}</h2>
			<p>{{$post->cuerpo}}</p>
			<p>Agregado hace {{$post->created_at->diffForHumans()}}</p>
			<a href="/posts">Regresar</a>
		</div>		
	</div>
@endsection