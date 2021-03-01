@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card sombra m-3 col-xs-12 col-sm-12 col-md-10 col-lg-8 col-xl-6">
            <div class="p-3 d-flex flex-column align-items-center justify-content-center">
                @if(Storage::disk('images')->has($post->image))
                    <img class="imageBig m-3" src="{{ route('image',['post'=> $post]) }}" alt="{{ $post->image }}"/>
                @endif
                <div class="pl-1 m-4"><h2>{{ $post->title}}</h2></div>
                <div class="m-4">
                    <div>
                        <span>{{ $post->body}}</span>
                    </div>
                </div>
                <div class="card details m-4">
                    <div class="card-body">
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
            </div>
        </div>
    </div>
</div>
@endsection
