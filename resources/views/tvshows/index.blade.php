<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TV Shows') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("TV Show list") }}
                        <div>
                            <a href="{{ route('tvshows.create') }}" class="btn btn-success">+ Add TV Show</a>
                        </div>
                        <div class="row">
                            <h2 class="mb-4">Existing TV shows</h2>
                            <table class="table table-bordered table-striped" id="tvShowTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Year</th>
                                    <th>Thumbnail</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
            //$(document).ready(function () {
            document.addEventListener('livewire:navigated', function () {
                let table = $('#tvShowTable').dataTable({
                    processing: true,
                    serverSide: true,
                    method: 'get',
                    ajax: "{{ route('tvshows_list') }}",
                    columns: [
                        {data: 'id'},
                        {data: 'name'},
                        {data: 'year'},
                        {data: 'thumbnail', render: function(datum) { return '<img src="showtvshowimage/' + datum + '">' }},
                        {data: 'action'}
                    ]
                });
            });
        </script>
    @endsection
</x-app-layout>
