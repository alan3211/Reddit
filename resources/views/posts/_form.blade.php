	{{csrf_field()}}		
	<div class="form-group">
		<label for="titulo" class="control-label">Titulo:</label>
			<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresa el titulo de tu POST" value="{{$post->titulo or old('titulo')}}">
	</div>
		
	<div class="form-group">
		<label for="cuerpo">Contenido:</label>
		<textarea name="cuerpo" id="cuerpo" class="form-control" rows="3" placeholder="Ingresa el contenido del post">{{$post->cuerpo or old('cuerpo')}}</textarea>
	</div>

	<div class="form-group">
		<label for="url">URL:</label>
			<input type="text" name="url" id="url" name="url" class="form-control" placeholder="Ingresa la URL" value="{{$post->url or old('url')}}">
	</div>
		
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Guardar Post</button>
	</div>		
</form>