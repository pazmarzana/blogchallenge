@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{route('posts.update',['post' => $post]) }}" class="form-group formulario" enctype="multipart/form-data" >
                @method('PATCH')
                @csrf
                <div class="form-group m-4">
                    <label for="title">Titulo</label>
                    <input type="text" name="title" minlength="2" maxlength="30" class="form-control @error('title')
                    border-danger @enderror" value="{{old('title') ? old('title') : $post->title}}" required>
                    @error('title')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group m-4">
                    <label for="body">Contenido</label>
                    <input type="text" name="body" minlength="2" maxlength="300000" class="form-control @error('body')
                    border-danger @enderror" value="{{old('body') ? old('body') : $post->body}}" required>
                    @error('body')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group m-4">
                    <label for="image">Imagen</label>
                    <input type="file" name="image" class="form-control @error('image')
                    border-danger @enderror" value="{{old('image') ? old('image') : $post->image}}" >
                    @error('image')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group m-4">
                    <label for="category_id">Categoria</label>
                    <select type="text" name="category_id" class="form-control" >
                    @foreach($categories->all() as $category)
                        <option {{ (old('category_id') ? old('category_id') : $post->category_id) == $category->id  ? "selected" : '' }} value="{{ $category->id }}">{{ $category->id }} - {{ $category->name }}</option>
                    @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-dark  m-4">Guardar</button>
            </form>

        </div>
    </div>
</div>
@endsection
