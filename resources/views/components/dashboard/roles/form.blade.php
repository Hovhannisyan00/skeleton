<div class="row">
    <div class="col-lg-6 form-group">
        <x-dashboard.form._input name="first_name" value="{{ $user->first_name ?? '' }}"/>
    </div>
    <div class="col-lg-6 form-group">
        <x-dashboard.form._input name="last_name" value="{{ $user->last_name ?? '' }}"/>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 form-group">
        <x-dashboard.form._input name="email" type="email" value="{{ $user->email ?? '' }}"/>
    </div>
    <div class="col-lg-6 form-group">
        <x-dashboard.form._select name="role_ids[]" :data="$roles" :value="$userRoleIds ?? ''" multiple class="select2"/>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 form-group">
        <x-dashboard.form._select
            name="research_area_ids[]"
            :data="$researchAreas"
            multiple
            class="select2"
            title="Research Areas"
            :value="$userResearchAreaIds ?? ''"
        />
    </div>
    <div class="col-lg-6 form-group">
        <x-dashboard.form._file name="signature" :value="$user->signature ?? ''"/>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 form-group">
        <x-dashboard.form._input name="password" type="password"/>
    </div>
    <div class="col-lg-6 form-group">
        <x-dashboard.form._input name="password_confirmation" type="password"/>
    </div>
</div>
