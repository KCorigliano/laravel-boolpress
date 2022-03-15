@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex">
            <span>Creazione post</span>
          </div>

          <div class="card-body">

            <form action="{{ route('admin.post.store') }}" method="post">
              @csrf

            <div class="mb-3">
                <label>Titolo</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                  placeholder="Inserisci qui il tuo titolo" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label>Contenuto</label>
                <textarea name="content" rows="10" class="form-control @error('content') is-invalid @enderror"
                  placeholder="Inserisci qui il tuo contenuto..." required>{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <a href="{{ route('admin.post.index') }}" class="btn btn-danger">Annulla</a>
                <button type="submit" class="btn btn-success">Salva post</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection