@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-6 col-xl-6">
            @foreach ($posts as $post)
            <div class="card mt-2">
                <div class="card-body">
                    <div>
                        <span class="font-weight-bold pr-2">Título:</span>
                        <span>{{ $post->title}}</span>
                    </div>
                    <div>
                        <span class="font-weight-bold pr-2">ID:</span>
                        <span>{{ $post->id}}</span>
                    </div>
                    <div>
                        <span class="font-weight-bold pr-2">Imagen:</span>
                        <span>{{ $post->image}}</span>
                    </div>
                    <div>
                        <span class="font-weight-bold pr-2">Categoria:</span>
                        <span>{{ $post->category->name}}</span>
                    </div>
                    <div>
                        <span class="font-weight-bold pr-2">Fecha de creación:</span>
                        <span>{{ $post->created_at}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
