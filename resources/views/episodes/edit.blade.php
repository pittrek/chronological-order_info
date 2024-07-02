@extends('layouts.app')

@section('content')
    <div style="margin: auto; width: 80%;">
        <div class="border rounded-5">
            <section class="w-100 p-4 text-center pb-4">
                <form action="{{ route('episodes.update', ['episode' => $episode]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <div class="form-outline">
                            <label for="season_id" class="form-label">Season</label>
                            <select name="season_id" id="season_id" class="form-control">
                                @foreach($seasons as $season)
                                    <option value="{{ $season->id }}" @if ($season->id == $episode->season_id) selected @endif>{{ $season->tv->name }} ({{ $season->tv->acronym }}) - {{ $season->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="form-outline">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $episode->name }}">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="number" class="form-label">Number:</label>
                        <input type="number" name="number" id="number" class="form-control" value="{{ $episode->number }}">
                    </div>
                    <div class="row mb-4">
                        <label for="description" class="form-group">Description:</label>
                        <textarea name="description" id="description" class="form-control" cols="80" rows="40">{{ $episode->description }}</textarea>
                    </div>
                    <div class="row mb-4">
                        <label for="thumbnail" class="form-group">Thumbnail</label>
                        <input type="file" name="thumbnail" id="thumbnail">
                    </div>
                    <div class="row mb-4">
                        <div class="form-outline">
                            <button class="btn btn-success" type="submit">Edit episode</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('select').select2();
        });
    </script>
@endsection
