<x-dashboard.layouts.app>
    <div class="container-fluid">
        <div class="card mb-4">
            <x-dashboard.layouts.partials.card-header/>
            <div class="card-body">
                <x-dashboard.form._form
                    :action="$viewMode === 'add' ? route('dashboard.articles.store') : route('dashboard.articles.update', $article->id)"
                    :indexUrl="route('dashboard.articles.index')"
                    :method="$viewMode === 'add' ? 'post' : 'put'"

                    :showStatus="$article->show_status"
                    hasShowStatus
                >
                    <div class="row">
                        <div class="col-lg-6 form-group required">
                            <x-dashboard.form._input name="slug" :value="$article->slug"/>
                        </div>
                        <div class="col-lg-6 form-group required">
                            <x-dashboard.form._input name="publish_date" class="datepicker"
                                                     :value="$article->publish_date"/>
                        </div>
                        <div class="col-lg-6 form-group required">
                            <x-dashboard.form.uploader._file
                                name="photo"
                                :configKey="$article->getFileConfigName()"
                                :value="$article->photo"
                            />
                        </div>
                    </div>

                    {{-- Multiple Group --}}
                    {{--<x-dashboard.form.multiple-group class="grouped" :multipleData="$article->group_multiple_fields ?? []">

                        <div class="form-group col-lg-12 mt-4">
                            <x-dashboard.form._input_multiple title="grouped_title" dataName="title" name="group_multiple_fields[0][title]"/>
                        </div>

                        <div class="form-group col-lg-12 mt-4">
                            <x-dashboard.form._input_multiple title="grouped_link" noLabel dataName="link" name="group_multiple_fields[0][link]"/>
                        </div>

                    </x-dashboard.form.multiple-group>--}}

                    {{-- Multiple --}}
                    {{--<x-dashboard.form.multiple-group :multipleData="$article->multiple_fields ?? []">

                        <div class="form-group col-lg-12 mt-4">
                            <x-dashboard.form._input_multiple title="multiple" noLabel name="multiple_fields[0]"/>
                        </div>

                    </x-dashboard.form.multiple-group>--}}

                    <x-dashboard.form.ml-form :mlData="$articleMl ?? ''">
                        <div class="form-group mt-4 required">
                            <x-dashboard.form._input name="title"/>
                        </div>
                        <div class="form-group mt-4 required">
                            <x-dashboard.form._input name="short_description"/>
                        </div>
                        <div class="form-group required">
                            <x-dashboard.form._textarea name="description" class="ckeditor5"/>
                        </div>
                        <div class="form-group">
                            <x-dashboard.form._textarea name="meta_description"/>
                        </div>
                        <div class="form-group mt-4">
                            <x-dashboard.form._input name="meta_title"/>
                        </div>
                        <div class="form-group mt-4">
                            <x-dashboard.form._input name="keywords"/>
                        </div>
                    </x-dashboard.form.ml-form>
                </x-dashboard.form._form>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="{{ asset('/js/dashboard/article/main.js') }}"></script>
    </x-slot>
</x-dashboard.layouts.app>






