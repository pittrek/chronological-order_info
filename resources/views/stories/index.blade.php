<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Stories') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Story list") }}
                        <div>
                            <a href="{{ route('stories.create') }}" class="btn btn-success">+</a>
                        </div>
                        <div class="row">
                            <h2 class="mb-4">Existing stories</h2>
                            <table class="table table-bordered table-striped" id="storiesTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order number</th>
                                        <th>Season</th>
                                        <th>Episode number</th>
                                        <th>Episode title</th>
                                        <th>TV Show</th>
                                        <th>Movie</th>
                                        <th></th>
                                        <!--<th>#</th>
                                        <th>Order number</th>
                                        <th>Episode</th>
                                        <th>Movie</th>
                                        <th>Tools</th>-->
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
            //$(document).ready(function () {
            document.addEventListener('livewire:navigated', function () {
                let table = $('#storiesTable').dataTable({
                    processing: true,
                    serverSide: true,
                    method: 'get',
                    ajax: "{{ route('stories_list') }}",
                    columns: [
                        {data: 'id'},
                        {data: 'orderNum'},
                        {data: 'season'},
                        {data: 'number'},
                        {data: 'name'},
                        {data: 'tvshow'},
                        {data: 'movie'},
                        {data: 'action'}

                        /*{data: 'episode'},
                        {data: 'movie'},
                        {data: 'action'}*/
                    ]
                });


            });

            document.addEventListener('livewire.navigated', () => {
                $('.switcher').on('click', function() {
                    alert($(this).data("rowId"));
                })
            });

        </script>
    @endsection
</x-app-layout>
