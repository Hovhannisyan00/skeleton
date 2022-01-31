<x-dashboard.layouts.app>
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">{{ $subHeaderData['pageName'] ?? '' }}</h3>
                </div>

                <div class="ml-auto">
                    <a href="{{ route('dashboard.users.create') }}" class="btn btn-create">
                        <i class="flaticon2-plus mr-2"></i>
                        {{ __($subHeaderData['pageName'].'.create') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form class="ml-auto row d-flex  justify-content-between flex-wrap"
                      id="dataTable__search__form">
                    <div class="row col-md-11 p-0 m-0">
                        <div class="col-md-4 form-group">
                            <x-dashboard.form._input name="id" type="number"/>
                        </div>
                        <div class="col-md-4 form-group">
                            <x-dashboard.form._input name="name"/>
                        </div>
                    </div>
                    <div class="col-md-1 form-group text-right d-flex flex-column justify-content-end ">
                        <x-dashboard.form._loader_btn/>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table w-100" id="__data__table">
                        <thead>
                        <tr>
                            <th data-key="id">ID</th>
                            <th data-key="name">Role</th>
                            <th data-key="created_at">Publish Date</th>
                            <th class="text-center" style="width: 90px">Actions</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            const options = {
                pathOptions: {
                    searchPath: '{{ route('dashboard.roles.getListData') }}',
                    deletePath: '{{ route('dashboard.roles.destroy', ':id') }}',
                    editPath: '{{ route('dashboard.roles.edit', ':id') }}',
                },
                actions: {
                    show: false
                },
                order: [[0, 'asc']],
            }
            new DataTable(options);
        </script>
    </x-slot>
</x-dashboard.layouts.app>




