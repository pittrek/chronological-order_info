@extends('layouts.app')

@section('content')
    <div style="margin: auto; width: 80%;">
        <div class="border rounded-5">
            <section class="w-100 p-4 text-center pb-4">
                <form action="{{ route('stories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="form-outline">
                            <label for="episode_id" class="form-label">Episode</label>
                            <select name="episode_id" id="episode_id" class="form-control">
                                <option></option>
                                @foreach($episodes as $episode)
                                    <option value="{{ $episode->id }}">{{ $episode->season->tv->acronym }} : s{{ $episode->season->name }}e{{ $episode->number }} - {{ $episode->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="form-outline">
                            <label for="movie_id" class="form-label">Movie</label>
                            <select name="movie_id" id="movie_id" class="form-control">
                                <option></option>
                                @foreach($movies as $movie)
                                    <option value="{{ $movie->id }}">{{ $movie->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="form-outline">
                            <label for="name" class="form-label">Order number</label>
                            <input type="number" name="orderNum" id="orderNum" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="form-outline">
                            <button class="btn btn-success" type="submit">Add new story</button>
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
