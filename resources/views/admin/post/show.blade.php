@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="show-img d-flex">
                    <span class="go-back"><a href="{{ route('admin.post.index') }}"><</a></span>
                    @if ($post->image)
                        <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}" alt="" class="post-img">
                    @else
                        <img class="img-fluid" src="https://via.placeholder.com/1024x480" alt="" class="img-fluid">
                    @endif
                </div>
                <div class="card-body px-4 pt-1">
                    <div class="row justify-content-between border-top align-items-center mb-4">
                        <h2 class="text-uppercase">{{$post->title}}</h2>
                        <p><a class="ms-auto" href="{{ route('admin.post.edit', $post->id) }}">Modifica</a></p>
                    </div>
                    <p>{{$post->content}}</p>
                    
                    <div class="mb-3">
                        <p class="mb-0">Tags:</p>
                        @foreach ($post->tags as $tag)
                        <p class="mx-4">- {{ $tag->name }}</p>
                        @endforeach
                    </div>
                    
                    <div class="row align-items-center">
                        <p
                        class="font-italic mb-0 px-3">
                        @php
                            use Carbon\Carbon;
                            $euroFormat = 'd/m/Y H:i';
                        @endphp
                        {{$post->user->name}} 
                        - 
                        {{$post->user->email}} 
                        -
                        {{$post->updated_at->format($euroFormat)}}</p>
                            
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection