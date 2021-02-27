<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::select('id', 'title', 'image', 'category_id', 'created_at')->orderBy('created_at', 'DESC')->orderBy('id', 'DESC')->get();
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
        $validatedData = $this->validate($request, [
            'title' => 'required|min:2|max:30',
            'body' => 'required|min:2|string',
            'image' => 'nullable',
            'category_id' => 'required|exists:categories,id',
        ]);
        $post = Post::create($validatedData);

        return redirect()->route('showdetail', ['id' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return (["error" => "404", "message" => "No existe un post con dicho indice"]);
        } else {
            return $post;
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return (["error" => "404", "mensaje" => "No existe un post con dicho indice"]);
        } else {
            $post->delete();
            return redirect(route('posts.index'));
        }
    }

    public function showdetail($id)
    {
        //$post = $this->show($id); //posibilidad para utilizar la funcion show del back
        $post = Post::find($id);
        if (!$post) {
            return (["error" => "404", "message" => "No existe un post con dicho indice"]);
        } else {
            return view('posts.detail', compact('post'));
        }
    }
}
