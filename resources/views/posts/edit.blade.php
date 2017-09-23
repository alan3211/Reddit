@extends('plantillas.master')

@section('content')	
	<h2>Editando Post</h2>
	<form action="{{route('update_post_path',['post' => $post->id])}}" method="POST" role="form">		
	{{method_field('PUT')}}	
	@include('posts._form',["post" => $post])
@endsection