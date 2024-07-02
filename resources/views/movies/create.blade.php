@extends('layouts.app')

@section('content')
    <div class="row">
    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <label for="name" class="form-group">Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="input-group mb-3">
                <label for="year" class="form-group">Year:</label>
                <input type="number" min="1900" max="2099" step="1" class="form-control" name="year" id="year">
        </div>
        <div class="input-group mb-3">
                <label for="version" class="form-group">Version</label>
                <input type="text" name="version" id="version" class="form-control">
        </div>
        <div class="input-group mb-3">
                <label for="description" class="form-group">Description:</label>
                <textarea name="description" id="description" class="form-control" cols="80" rows="40"></textarea>
        </div>
        <div class="input-group mb-3">
            <label for="thumbnail" class="form-group">Thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail">
        </div>
        <div class="input-group mb-3">
            <label for="shortcut" class="form-group">Acronym</label>
            <input type="text" name="shortcut" id="shortcut">
        </div>
        <div class="input-group mb-3">
            <button class="btn btn-success" type="submit">Add new movie</button>
        </div>
    </form>
    </div>
@endsection
