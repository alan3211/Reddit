@extends('plantillas.master')

@section('content')
	@foreach($posts as $post)
	<div class="row">
		<div class="col-md-12">
			<h2>
				<a href="{{route('post_path',['post' => $post->id])}}">{{$post->titulo}}</a>
				@if($post->user_id == Auth::user()->id)
				<small class="pull-right">
					<a href="{{route('edit_post_path',['post' => $post->id])}}" class="btn btn-info">Editar</a>
					<form class="formulario" action="{{route('delete_post_path',['post'=> $post->id])}}" method="POST">
						{{csrf_field()}}
						{{method_field("DELETE")}}
						<div style="margin-top:10px;">
							<button type="button" class="btn btn-danger enviar">Eliminar</button>
						</div>						
					</form>
				</small>
				@endif
			</h2>
			<p>{{$post->cuerpo}}</p>
			<span>Agregado hace {{$post->created_at->diffForHumans()}}</span>
		</div>
	</div>	
	@endforeach
	<div class="text-center">
		{{$posts->render()}}
	</div>	
		
	<script type="text/javascript">

	$(".enviar").click(function(){
		swal({
  				title: '¿Estas seguro que deseas eliminar el Post?',
  				text: "Una vez borrado, no se podrá recuperar el post",
  				type: 'warning',
  				showCancelButton: true,
  				confirmButtonColor: '#3085d6',
  				cancelButtonColor: '#d33',
  				confirmButtonText: 'Sí',
  				cancelButtonText: 'No',
			}).then((willDelete) => {				
  				@if(Auth::check())
  					if (willDelete) {  					
    					swal('Post Eliminado','El post se elimino correctamente!','success');
    					$(".formulario").submit();  					
  					} 
  				@endif		
			});						
	});		
	</script>
@endsection