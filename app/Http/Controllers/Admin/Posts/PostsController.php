<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Il metodo all del model estrae tutti i risultati otenuti dal DB
        // equivale a SELECT * FROM
        $posts = Post::all();
        //$posts = Post::paginate(10);
        return view('backend.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $user_id = Auth::user()->id;
        $post = new Post(array(
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => Str::slug($request->get('title'),'-'),
            'user_id' => $user_id,
        ));
        $post->save();
        //sincronizzo la relazione molti a molti che esiste tra post e categoria
        //la relazione è effettuata attraverso i model
        //categories è un metodo del model dove è definita la relazione
        //con sync pieno la tabella passando il valore della categoria,
        //acquisita dalla richiesta
        $post->categories()->sync($request->get('categories'));
        return back()->with('status','Articolo inserito correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::whereId($id)->firstOrFail();
        $categories = Category::all();
        $selectedCategories = $post->categories->pluck('id')->toArray();
        return view('backend.post.edit',compact('post','categories','selectedCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, $id)
    {
        $post = Post::whereId($id)->firstOrFail();
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->slug = Str::slug($request->get('title'),'-');
        $post->save();
        $post->categories()->sync($request->get('categories'));
        return redirect(action('App\Http\Controllers\Admin\Posts\PostsController@edit',$post->id))
        ->with('status','Post modificato correttamente');
    }


    public function destroy($id)
    {
        $post = Post::whereId($id)->firstOrFail();
        $img = Image::wherePostId($id)->firstOrFail();
        $nameImg = $img->title;
        $nameImg = explode('/img/',$nameImg);

        if(file_exists(public_path('articoli\img\\').$nameImg[1]))
        {
            unlink(public_path('articoli\img\\').$nameImg[1]);
        }

        $post->delete();
        return redirect('admin/posts/')->with('status',' Post eliminato correttamente');
    }
}
