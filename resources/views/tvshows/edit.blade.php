@extends('layouts.app')

@section('content')
    <div class="row">
        <form action="{{ route('tvshows.update', ['tvshow' => $tvshow]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <label for="name" class="form-group">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $tvshow->name }}">
            </div>
            <div class="input-group mb-3">
                <label for="year" class="form-group">Year:</label>
                <input type="number" min="1900" max="2099" step="1" class="form-control" name="year" id="year" value="{{ $tvshow->year }}">
            </div>
            <div class="input-group mb-3">
                <label for="acronym" class="form-group">Acronym</label>
                <input type="text" name="acronym" id="acronym" value="{{ $tvshow->acronym }}">
            </div>
            <div class="input-group mb-3">
                <label for="thumbnail" class="form-group">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>

            <div class="input-group mb-3">
                <button class="btn btn-success" type="submit">Edit TV show</button>
            </div>
        </form>
    </div>
@endsection
