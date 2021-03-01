<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::select('id', 'title', 'image', 'category_id', 'created_at')->orderBy('created_at', 'DESC')->orderBy('id', 'DESC')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validatePost($request);
        $imageAux = $request->image;
        if ($imageAux) {
            $image_path = time() . $imageAux->getClientOriginalName();
            \Storage::disk('images')->put($image_path, \File::get($imageAux));
        }
        $data = array_diff_key($validatedData, array_flip(["image"]));
        $data["image"] = $image_path;
        $post = Post::create($data);

        return redirect($post->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.detail', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $this->validatePost($request);
        $imageAux = $request->image;
        if ($imageAux) {
            $image_path = time() . $imageAux->getClientOriginalName();
            \Storage::disk('images')->put($image_path, \File::get($imageAux));
        }
        $data = array_diff_key($validatedData, array_flip(["image"]));
        $data["image"] = $image_path;
        $post->update($data);
        return redirect($post->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('home'));
    }

    protected function validatePost($request)
    {
        return $request->validate([
            'title' => 'required|min:2|max:30',
            'body' => 'required|min:2|string',
            'image' => 'file|mimes:jpg,bmp,png',
            'category_id' => 'required|exists:categories,id',
        ]);
    }

    public function getImage(Post $post)
    {
        $file = Storage::disk('images')->get($post->image);
        return response($file, 200);
    }
}
