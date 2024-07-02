@extends('layouts.app')

@section('content')
    <div style="margin: auto; width: 80%;">
        <div class="border rounded-5">
            <section class="w-100 p-4 text-center pb-4">
            <form action="{{ route('seasons.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <div class="form-outline">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="tvshow_id" class="form-label">TV Show:</label>
                    <select name="tvshow_id" id="tvshow_id">
                        @foreach ($tvshows as $tvshow)
                            <option value="{{ $tvshow->id }}">{{ $tvshow->name }} ({{ $tvshow->acronym }} )</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mb-4">
                    <div class="form-outline">
                        <button class="btn btn-success" type="submit">Add new season</button>
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
