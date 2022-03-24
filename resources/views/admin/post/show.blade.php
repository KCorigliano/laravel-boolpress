@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card px-4 py-2">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->images) }}" alt="" class="img-fluid">
                @else
                    <img src="https://via.placeholder.com/1024x480" alt="" class="img-fluid">
                @endif
                <div class="row justify-content-between border-bottom align-items-center mb-4">
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