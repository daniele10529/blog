<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ImageFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{

    public function index($id)
    {
        //acquisisco l'id del post per poterci caricare l'immagine
        //passo il valore alla view dove carico l'immagine
        //arrivo dalla view con la lista dei post
        return view('backend.image.image-upload',compact('id'));
    }

    public function store(ImageFormRequest $request, $id)
    {
        //acquisisco il nome del file nell'input image con la superglobale
        //$_files
        $thumb = $_FILES['image']['name'];
        //inserisco il file nella cartella pubblica, lo faccio attraverso la request.
        //se le sottocartelle non esistono le crea
        $request->image->move(public_path('articoli\img'),$thumb);
        //Istanzio il model Imag e salvo l'url dell'immagine nel DB
        $data = $thumb;
        $img = new Image();
        $img->title = 'http://localhost/laravel/blog/public/articoli/img/'.$data;
        //dalla view di caricamento dell'immagine ottengo l'id del post
        //per poter inserire il valore corrispondente nella foreign key
        //per tale ragione è necassario il passaggio dell'id dal metodo index
        $img->post_id = $id;
        $img->save();
        return back()->with('status','Immagine caricata correttamente')
            ->with(' Image '.$data);
    }

    public function update(ImageFormRequest $request)
    {
        //modifico l'immagine del post.
        $thumb = $_FILES['image']['name'];
        $id = $request->get('post_id');
        $request->image->move(public_path('articoli/img'),$thumb);
        $data = $thumb;
        $img = Image::wherePostId($id)->firstOrFail();
        $img->title = 'http://localhost/laravel/blog/public/articoli/img/'.$data;
        $img->post_id = $id;
        $img->save();
        return back()->with('status','Immagine aggiornata correttamente')
            ->with(' Image '.$data);
    }

}
