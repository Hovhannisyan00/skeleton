<x-dashboard.layouts.app>
    <div class="container-fluid">
        <div class="card mb-4">
            <x-dashboard.layouts.partials.card-header :createRoute="route('dashboard.users.create')"/>
            <div class="card-body">
                <form class="ml-auto row d-flex  justify-content-between flex-wrap"
                      id="dataTable__search__form">
                    <div class="row col-md-11 p-0 m-0">
                        <div class="col-md-4 form-group">
                            <x-dashboard.form._input name="first_name"/>
                        </div>
                        <div class="col-md-4 form-group">
                            <x-dashboard.form._input name="last_name"/>
                        </div>
                        <div class="col-md-4 form-group">
                            <x-dashboard.form._input name="email"/>
                        </div>
                    </div>
                    <div class="col-md-1 form-group text-right d-flex flex-column justify-content-end ">
                        <x-dashboard.form._loader_btn/>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table w-100 table-hover" id="__data__table">
                        <thead>
                        <tr>
                            <th data-key="id">{{ __('__dashboard.label.id') }}</th>
                            <th data-key="first_name">{{ __('__dashboard.label.first_name') }}</th>
                            <th data-key="last_name">{{ __('__dashboard.label.last_name') }}</th>
                            <th data-key="email">{{ __('__dashboard.label.email') }}</th>
                            <th data-key="roles" data-orderable="false">{{ __('__dashboard.label.roles') }}</th>
                            <th data-key="created_at">{{ __('__dashboard.label.created_at') }}</th>
                            <th class="text-center" style="width: 90px">{{ __('__dashboard.label.actions') }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="{{ asset('/js/dashboard/user/index.js') }}"></script>
    </x-slot>
</x-dashboard.layouts.app>




