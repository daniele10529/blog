<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Il controller acquisisce i dati attraverso il Model
    //e li passa alla view ritornando o una view
    //o un redirect.
    //i dati si passano attraverso il comando compact che ritorna
    //un array con i valori della variabile acquisita
    //i controller hanno di default (se creati con -r)
    //i metodi index, store, edit, update, destroy.
    //index e edit servono a visualizzare le pagine
    //store e update a modificare in effetti i dati
    //i primi sono in genere rischieste get, gli altri post
    //anche il destroy è un post ed elimina i dati
    public static function home(){
        $posts = Post::all();
        //$posts = Post::paginate(5);
        $images = Image::all();
        return view('home',compact('posts','images'));
    }

    public function show($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $comments = $post->comment;
        $images = Image::all();
        return view('blog.show',compact('post','comments','images'));
    }
}
?>
