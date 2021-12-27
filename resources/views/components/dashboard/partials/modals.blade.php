<div class="modal fade" id="d_confirm__modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="dialog">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('__dashboard.modal.confirm_action') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('__dashboard.modal.are_you_sure') }}
            </div>
            <div class="modal-footer border-0 py-0 pb-2">
                <button type="button" class="btn btn-secondary py-2" data-dismiss="modal">{{ __('__dashboard.button.cancel') }}</button>
                <button type="button" class="btn btn-danger py-2 delete-btn">
                    {{ __('__dashboard.button.delete') }}
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>
