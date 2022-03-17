<x-dashboard.layouts.app>

    <x-slot name="head">
        <link rel="stylesheet" href="{{ asset('/plugins/croppie/croppie.min.css') }}" />
    </x-slot>

    <div class="container-fluid">
        <div class="card mb-4">

            <x-dashboard.form._form
                :action="route('dashboard.profile.update', auth()->id())"
                :indexUrl="route('dashboard.index')"
                method="put"
            >

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <x-dashboard.form.uploader._file name="avatar" :value="$user->avatar" :crop="true" :configKey="$user->getFileConfigName()"/>
                        <x-dashboard.form.modals._crop id="cropImage" static></x-dashboard.form.modals._crop>
                    </div>

                    <div class="form-group required">
                        <x-dashboard.form._input name="first_name" :value="$user->first_name"/>
                    </div>

                    <div class="form-group required">
                        <x-dashboard.form._input name="last_name" :value="$user->last_name"/>
                    </div>

                    <div class="form-group">
                        <x-dashboard.form._input name="email" disabled :value="$user->email"/>
                    </div>

                    <hr />

                    <div class="form-group">
                        <x-dashboard.form._input name="current_password" autocomplete="off" type="password"/>
                    </div>

                    <div class="form-group">
                        <x-dashboard.form._input name="new_password" autocomplete="off" type="password"/>
                    </div>

                    <div class="form-group mb-0">
                        <x-dashboard.form._input name="new_password_confirmation" autocomplete="off" type="password"/>
                    </div>
                </div>
            </div>

            </x-dashboard.form._form>

        </div>
    </div>

    <x-slot name="scripts">
        <script src="{{ asset('/plugins/croppie/croppie.min.js') }}"></script>
        <script src="{{ asset('/js/dashboard/profile/main.js') }}"></script>
    </x-slot>
</x-dashboard.layouts.app>
