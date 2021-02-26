@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($posts as $post)
            <div class="card mt-2">
                <div class="card-body">
                        <div>
                            {{ $post->title}}
                        </div>
                        <a href="{{ route('showdetail',['id'=> $post->id]) }}" class="btn btn-default btn-sm m-1 text-white"><i class="far fa-eye text-secondary"></i></a>
                        <a href="{{ route('posts.edit',['post' => $post]) }}"class="btn btn-default btn-sm m-1"><i class="fas fa-pencil-alt text-secondary"></i></a>
                        <form method="POST" action="{{ route('posts.destroy',['post' => $post]) }}"  class="d-inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-default  btn-sm m-1 ">
                                <i class="far fa-trash-alt text-secondary"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
