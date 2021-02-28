@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="pl-1 m-4"><h2>{{ $post->title}}</h2></div>
            <div class="card mt-2">
                <div class="card-body">
                    <span class="font-weight-bold pr-2">ID:</span>
                    <span>{{ $post->id}}</span>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <span class="font-weight-bold pr-2">Título:</span>
                    <span>{{ $post->title}}</span>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <span class="font-weight-bold pr-2">Contenido:</span>
                    <span>{{ $post->body}}</span>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <span class="font-weight-bold pr-2">Imagen:</span>
                    <span>{{ $post->image}}</span>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <span class="font-weight-bold pr-2">Categoria:</span>
                    <span>{{ $post->category->name}}</span>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <span class="font-weight-bold pr-2">Fecha de creación:</span>
                    <span>{{ $post->created_at}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
