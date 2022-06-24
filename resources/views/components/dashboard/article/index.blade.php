<x-dashboard.layouts.app>
    <div class="container-fluid">
        <div class="card mb-4">
            <x-dashboard.layouts.partials.card-header :createRoute="route('dashboard.articles.create')"/>
            <div class="card-body">
                <form class="ml-auto row d-flex  justify-content-between flex-wrap"
                      id="dataTable__search__form">
                    <div class="row col-md-11 p-0 m-0">
                        <div class="col-md-4 form-group">
                            <x-dashboard.form._input name="id" type="number"/>
                        </div>
                        <div class="col-md-4 form-group">
                            <x-dashboard.form._input name="title"/>
                        </div>
                        <div class="col-md-4 form-group">
                            <x-dashboard.form._input name="description"/>
                        </div>
                        <div class="col-md-4 form-group">
                            <x-dashboard.form._show_status class="default-search" defaultOption :value="App\Models\Base\BaseModel::SHOW_STATUS_ACTIVE"/>
                        </div>
                    </div>
                    <div class="col-md-1 form-group text-right d-flex flex-column justify-content-end">
                        <x-dashboard.form._loader_btn/>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table w-100 table-hover" id="__data__table">
                        <thead>
                        <tr>
                            <th data-key="id">{{ __('__dashboard.label.id') }}</th>
                            <th data-key="title">{{ __('__dashboard.label.title') }}</th>
                            <th data-key="description">{{ __('__dashboard.label.description') }}</th>
                            <th data-key="publish_date">{{ __('__dashboard.label.publish_date') }}</th>
                            <th data-key="created_at">{{ __('__dashboard.label.created_at') }}</th>
                            <th data-key="show_status" data-orderable="false">{{ __('__dashboard.label.show_status') }}</th>
                            <th class="text-center">{{ __('__dashboard.label.actions') }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="{{ asset('/js/dashboard/article/index.js') }}"></script>
    </x-slot>
</x-dashboard.layouts.app>




