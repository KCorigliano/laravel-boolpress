@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card px-4 py-2">
                <div class="row justify-content-between border-bottom align-items-center mb-4">
                    <h2 class="text-uppercase">{{$post->title}}</h2>
                    <p><a class="ms-auto" href="{{ route('admin.post.edit', $post->id) }}">Modifica</a></p>
                </div>
                <p>{{$post->content}}</p>
                <p class="font-italic mb-0">{{$post->user->name}}</p>
                <p class="font-italic">{{$post->user->email}}</p>
            </div>
        </div>
    </div>
</div>
@endsection