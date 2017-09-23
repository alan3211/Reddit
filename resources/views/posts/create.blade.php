@extends('plantillas.master')

@section('content')
	<h2>Creando Post</h2>
	<form action="{{route('store_post_path')}}" method="POST" role="form">
	@include('posts._form',["post" => $post])
@endsection