<x-dashboard.layouts.app>
    <div class="container-fluid">
        <div class="card mb-4">
            <x-dashboard.form._form-ml
                :action="$viewMode === 'add' ? route('dashboard.articles.store') : route('dashboard.articles.update', $article->id)"
                :indexUrl="route('dashboard.articles.index')"
                :method="$viewMode === 'add' ? 'post' : 'put'"

                :mlData="$articleMl ?? ''"
                :showStatus="$article->show_status ?? ''"
            >

                {{-- General Data --}}
                <x-slot name="generalTabData">
                    <div class="row">
                        <div class="col-lg-6 form-group required">
                            <x-dashboard.form._input name="slug" :value="$article->slug"/>
                        </div>

                        <div class="col-lg-6 form-group required">
                            <x-dashboard.form._date name="publish_date" class="datepicker" :value="$article->publish_date"/>
                        </div>

                        <div class="col-lg-6 form-group required">
                            <x-dashboard.form.uploader._file
                                name="photo"
                                :configKey="$article->getFileConfigName()"
                                :value="$article->photo"
                            />
                        </div>

                        <div class="col-lg-6 form-group required">
                            <x-dashboard.form._date dateTime name="release_date_time" class="datetimepicker" :value="$article->release_date_time"/>
                        </div>
                    </div>

                    {{-- Multiple Group --}}
                    <x-dashboard.form.multiple-group class="grouped" :multipleData="$article->multiple_group_data ?? []">

                        <div class="form-group col-lg-12">
                            <x-dashboard.form._input_multiple title="grouped_title" noLabel dataName="title" name="multiple_group_data[0][title]"/>
                        </div>

                        <div class="form-group col-lg-12">
                            <x-dashboard.form._input_multiple title="grouped_link" noLabel dataName="link" name="multiple_group_data[0][link]"/>
                        </div>

                    </x-dashboard.form.multiple-group>

                    {{-- Multiple --}}
                    <x-dashboard.form.multiple-group class="content-group" :multipleData="$article->multiple_author ?? []">

                        <div class="form-group col-lg-12">
                            <x-dashboard.form._input_multiple title="multiple_author" noLabel name="multiple_author[0]"/>
                        </div>

                    </x-dashboard.form.multiple-group>
                </x-slot>

                {{-- ML Data --}}
                <x-slot name="mlTabsData">
                    <div class="form-group required">
                        <x-dashboard.form._input name="title"/>
                    </div>
                    <div class="form-group required">
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
                </x-slot>

            </x-dashboard.form._form-ml>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="{{ asset('/js/dashboard/article/main.js') }}"></script>
    </x-slot>
</x-dashboard.layouts.app>






