@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-6 col-xl-6">
            @foreach ($posts as $post)
            <div class="card mt-2">
                <div class="card-body d-flex flex-md-row flex-column align-items-center justify-content-between">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
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
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        @if(Storage::disk('images')->has($post->image))
                            <img class="imageBig m-3" src="{{ route('image',['post'=> $post]) }}" alt="{{ $post->image }}"/>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
