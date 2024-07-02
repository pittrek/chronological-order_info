<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Movie list") }}
                    <div>
                        <a href="{{ route('movies.create') }}">+</a>
                    </div>
                    @foreach ($movies as $movie)
                        {{ $movie->name }}
                    @endforeach
                    <div class="row">
                        <h2 class="mb-4">Existing movies</h2>
                        <table class="table table-bordered table-striped" id="movieTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Year</th>
                                <th>Version</th>
                                <th>Description</th>
                                <th>Thumbnail</th>
                                <th>Shortcut</th>
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
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
            function initDataTable()
            {
                let table = $('#movieTable').dataTable({
                    processing: true,
                    serverSide: true,
                    method: 'get',
                    ajax: "{{ route('movies_list') }}",
                    columns: [
                        {data: 'id'},
                        {data: 'name'},
                        {data: 'year'},
                        {data: 'version'},
                        {data: 'description'},
                        {data: 'thumbnail', render: function(datum) { return '<img src="showimage/' + datum + '">' }},
                        {data: 'shortcut'},
                        {data: 'action'}
                    ]
                });
            }


            $(document).ready(function () {
                initDataTable();
            });

            //Livewire.on('navigate', id => { alert(id) })
        </script>
    @endsection
</x-app-layout>
