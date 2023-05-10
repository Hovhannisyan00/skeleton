@php
    $target = 'searchFormCollapse_'.rand();
    $addCollapse = !isset($withoutCollapse);
    $showCollapse = (bool)array_filter($_GET)
@endphp

<div class="text-right">
    @if($addCollapse)
    <button class="btn open__search__form__btn" type="button" data-toggle="collapse"
            data-target="#{{$target}}"
            aria-expanded="{{$showCollapse ? 'true' : 'false'}}"
            aria-controls="{{$target}}">
        <span class="text-search"><i class="fas fa-filter mr-2"></i></i>{{__('__dashboard.button.filters')}}</span>
        <span class="close-search"><i class="fa fa-times"></i></span>
    </button>
    @endif
</div>

<div class="datatable-search-collapse">
    <div class="{{$addCollapse ? 'collapse' : ''}} {{$showCollapse ? 'show' : ''}}"
         id="{{$target}}">
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
</div>
