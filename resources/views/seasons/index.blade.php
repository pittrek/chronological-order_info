<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Seasons') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Season list") }}
                        <div>
                            <a href="{{ route('seasons.create') }}" class="btn btn-success">+</a>
                        </div>
                        <div class="row">
                            <h2 class="mb-4">Existing seasons</h2>
                            <table class="table table-bordered table-striped" id="seasonsTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>TV Show</th>
                                        <th>Name</th>
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
                let table = $('#seasonsTable').dataTable({
                    processing: true,
                    serverSide: true,
                    method: 'get',
                    ajax: "{{ route('seasons_list') }}",
                    columns: [
                        {data: 'id'},
                        {data: 'tvshow'},
                        {data: 'name'},
                        {data: 'action'}
                    ]
                });
            });
        </script>
    @endsection
</x-app-layout>
