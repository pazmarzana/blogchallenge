@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @error('post')
            <div class="card mt-2">
                <div class="card-body">
                        <div>
                            {{ $message}}
                        </div>
                </div>
            </div>
            @enderror
            <div class="card mt-2">
                <div class="card-body">
                    <div><h2>{{ $post->title}}</h2></div>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <span>ID:</span>
                    <span>{{ $post->id}}</span>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <span>Título:</span>
                    <span>{{ $post->title}}</span>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <span>Contenido:</span>
                    <span>{{ $post->body}}</span>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <span>Imagen:</span>
                    <span>{{ $post->image}}</span>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <span>Categoria:</span>
                    <span>{{ $post->category->name}}</span>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <span>Fecha de creación:</span>
                    <span>{{ $post->created_at}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
