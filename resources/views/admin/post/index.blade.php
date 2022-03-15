@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a class="p-2" href="{{ route('admin.post.create') }}">Crea un nuovo post</a>
                @foreach ($posts as $post)
                    <div class="card p-2">
                        <p class="text-uppercase"><a href="{{ route('admin.post.show', $post->id) }}">{{ $post->title}}</a></p>
                        <p>{{ $post->content}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection