<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Tags;
use App\Posts_tags;
use App\Http\Controllers\Controller;
use App\Post;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where("user_id", Auth::user()->id)->get();
        return view('admin.post.index', compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $tags = Tags::all();
        return view("admin.post.create", compact("tags", "post"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required|min:5",
            "content" => "required|min:4",
            "category_id" => "nullable",
            "tags" => "nullable",
            "image" => "nullable|file|max:500"
        ]);
        $data = $request->all();

        $post = new Post();
        if (key_exists("image", $data)){
            $post->image = Storage::put("postImages", $data['image']);        
        }
        $post->fill($data);
        $post->user_id = Auth::user()->id;
        $post->save();
        $post->tags()->attach($data["tags"]);
        return redirect()->route("admin.post.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tags::all();
        return view('admin.post.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            "title" => "required|min:5",
            "content" => "required|min:4",
            "category_id" => "nullable",
            "tags" => "nullable",
            "image" => "nullable|file|max:500"
        ]);
        // se data contiene la chiave "coverImg", indica che l'utente sta caricando un file
        $post->update($data);
        if (key_exists("image", $data)) {
            // controllare se a db esiste già un immagine
            // Se si, PRIMA di caricare quella nuova, cancelliamo quella vecchia
            if($post->image){
                Storage::delete($post->image);
            }
            $image = Storage::put("postImages", $data["image"]);
            $post->image=$image;
            $post->save();
        }
        $post->tags()->sync($data["tags"]);
        return redirect()->route('admin.post.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
