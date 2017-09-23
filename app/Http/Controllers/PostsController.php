<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostsController extends Controller{
    
    // Index de la pagina de inicio
    public function index(){
    	$posts = Post::latest()->paginate(10);
    	return view('posts.index',compact('posts'));
    }
    // Muestra post individuales
    public function show(Post $post){
    	return view('posts.show',compact('post'));
    }
    //  Crea un nuevo post
    public function create(){
        $post = new Post;
    	return view('posts.create',compact('post'));
    }
    // Guarda el post
    public function store(CreatePostRequest $request){
        $post = new Post;

        $post->fill($request->only(['titulo','cuerpo','url']));

        $post->user_id = auth()->user()->id;

        $post->save();
        
        return redirect('/posts')->with('success', 'Post Creado correctamente');
    }

    // Edita el post
    public function edit(Post $post){
         // Redirecciona si no es su post para eliminar
        if($post->user_id != \Auth::user()->id){
            return redirect()->route('posts_path');    
        }
        return view('posts.edit',compact('post'));
    }

    public function update(Post $post,UpdatePostRequest $request){
        $post->update($request->only(['titulo','cuerpo','url']));
        alert()->success('El post se edito correctamente', 'Edición existosa!')->persistent('OK');;
        return redirect()->route('post_path',['post' => $post->id]);
    }

    public function delete(Post $post){ 

        // Redirecciona si no es su post para eliminar
        if($post->user_id != \Auth::user()->id){
            return redirect()->route('posts_path');    
        }

        $post->delete();       
        return redirect()->route('posts_path');
    }    


}