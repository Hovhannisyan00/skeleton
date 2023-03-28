@php
    $addCollapse = !isset($withoutCollapse);
@endphp

<div class="text-right">
    @if($addCollapse)
    <button class="btn btn-primary open__search__form__btn" type="button" data-toggle="collapse"
            data-target="#searchFormCollapse"
            aria-expanded="false"
            aria-controls="searchFormCollapse">
        <span class="text-search"><i class="fa fa-search mr-2"></i>{{__('__dashboard.button.search')}}</span>
        <span class="close-search"><i class="fa fa-times"></i></span>
    </button>
    @endif
</div>

<div class="{{$addCollapse ? 'collapse multi-collapse' : ''}}" id="searchFormCollapse">
    <form class="ml-auto" id="dataTable__search__form">
        <div class="row p-0">
            {{ $slot }}
        </div>
        <div class="text-right">
            <x-dashboard.form._loader_btn/>
            <button class="btn btn-danger reset__form__btn ml-2" type="button">
                {{__('__dashboard.button.reset')}}
            </button>
        </div>
    </form>
</div>
