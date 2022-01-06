<x-dashboard.layouts.app>
    <div class="container-fluid">
        <div class="card mb-4">
            <x-dashboard.layouts.partials.card-header/>
            <div class="card-body">
                <x-dashboard.form._form
                    :action="$viewMode === 'add' ? route('dashboard.users.store') : route('dashboard.users.update', $user->id)"
                    :indexUrl="route('dashboard.articles.index')"
                    :method="$viewMode === 'add' ? 'post' : 'put'"
                    hasShowStatus
                >

                    <div class="row">
                        <div class="col-lg-6 form-group required">
                            <x-dashboard.form._input name="first_name" value="{{ $user->first_name ?? '' }}"/>
                        </div>
                        <div class="col-lg-6 form-group required">
                            <x-dashboard.form._input name="last_name" value="{{ $user->last_name ?? '' }}"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 form-group required">
                            <x-dashboard.form._input name="email" type="email" value="{{ $user->email ?? '' }}"/>
                        </div>
                        <div class="col-lg-6 form-group required">
                            <x-dashboard.form._select name="role_ids[]" :data="$roles" :value="$userRoleIds ?? ''"
                                                      multiple class="select2"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 form-group required">
                            <x-dashboard.form.uploader._file
                                name="signature"
                                configKey="user"
                                :value="$user->signature ?? ''"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 form-group required">
                            <x-dashboard.form._input name="password" type="password"/>
                        </div>
                        <div class="col-lg-6 form-group">
                            <x-dashboard.form._input name="password_confirmation" type="password"/>
                        </div>
                    </div>
                </x-dashboard.form._form>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="{{ asset('/js/dashboard/user/main.js') }}"></script>
    </x-slot>
</x-dashboard.layouts.app>
