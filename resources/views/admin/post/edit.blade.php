@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex">
            Aggiunta di un nuovo post
          </div>

          <div class="card-body">

            <form action="{{ route('admin.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method("patch")

            <div class="mb-3">
                <label>Titolo</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                  placeholder="Inserisci il titolo" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="mb-3">
                <label>Contenuto</label>
                <textarea name="content" rows="10" class="form-control @error('content') is-invalid @enderror"
                  placeholder="Inizia a scrivere qualcosa..." required>{{ old('content', $post->content) }}</textarea>
            </div>
            
            <div class="mb-3">
              <label>Immagine di copertina</label>
              <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                placeholder="Inserisci il titolo">
              <span>{{ $post->image }}</span>
              @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            @foreach ($tags as $tag)
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                            type="checkbox" value="{{ $tag->id }}"
                            id="tag_{{ $tag->id }}" name="tags[]" 
                            {{ $post->tags->contains($tag) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="tag_{{ $tag->id }}">{{ $tag->name }}</label>
                  </div>
            @endforeach

            <div class="form-group">
                <a href="{{ route('admin.post.show', $post->id) }}" class="btn btn-danger">Annulla</a>
                <button type="submit" class="btn btn-success">Salva post</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection