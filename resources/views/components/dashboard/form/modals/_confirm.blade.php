<?php
$size ??= 'md';
$cancelBtnKey ??= 'cancel';
$saveBtnKey ??= 'save';
$saveBtnClass = isset($deleteType) ? 'danger' : 'success';
$saveBtnKey = isset($deleteType) ? 'delete' : $saveBtnKey;
$modalId = "confirmModal";
?>

<div class="modal fade" id="{{$modalId}}" tabindex="-1" role="dialog" aria-labelledby="{{$modalId}}Label"
     aria-modal="true" @isset($static) data-backdrop="static" @endisset>
    <div class="modal-dialog modal-{{$size}} modal-dialog-scrollable" role="dialog">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('__dashboard.modal.confirm_action') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                @isset($body)
                    {{$body}}
                @else
                    {{ __('__dashboard.modal.are_you_sure') }}
                @endisset
            </div>

            <div class="modal-footer pb-2">
            @isset($footer)
                {{ $footer }}
            @else

                @if(!isset($cancelHide))
                    <button type="button" class="btn btn-secondary py-2 cancel-btn"
                            data-dismiss="modal">{{__('__dashboard.button.'.$cancelBtnKey)}}</button>@endif

                @if(!isset($saveHide))
                     <button type="button"
                                class="btn btn-{{$saveBtnClass}} py-2 save-btn">{{__('__dashboard.button.'.$saveBtnKey)}}</button>@endif
            @endisset
            </div>

        </div>
    </div>
</div>
