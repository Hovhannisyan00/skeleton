<x-dashboard.layouts.app>
    <div class="container-fluid">
        <div class="card mb-4">
            <x-dashboard.layouts.partials.card-header/>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group">
                            <x-dashboard.form._input name="name" disabled :value="auth()->user()->name"/>
                        </div>

                        <div class="form-group">
                            <x-dashboard.form._input name="email" disabled :value="auth()->user()->email"/>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.layouts.app>
