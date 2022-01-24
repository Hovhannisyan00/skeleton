class MultipleInputs {

  constructor() {
    this.coreParentClass = 'core-multiple-inputs';
  }


  _addMultipleItem() {

    const $this = this;
    $('.core-multiple-button').click(function () {

      const parentGroupDiv = $(this).closest('.' + $this.coreParentClass);
      const clonedGroup = parentGroupDiv.find('.group-item:first').clone();
      const clonedGroupInputLength = clonedGroup.find('input').length;
      const groupItemsLength = parentGroupDiv.find('.group-item').length;

      if (clonedGroupInputLength) {

        $.each(clonedGroup.find(':input'), function (k, input) {

          let formGroup = $(input).closest('.form-group');
          let errorSpan = formGroup.find('.validation-error')

          let replacedName = $(input).attr('name').replace('0', groupItemsLength);
          let replacedErrorName = errorSpan.attr('data-name').replace('0', groupItemsLength);

          $(input).val('').attr('name', replacedName);
          errorSpan.attr('data-name', replacedErrorName).removeClass('has-error').text('');
          formGroup.removeClass('is-invalid');
        });

        if (clonedGroupInputLength > 1) {
          clonedGroup.addClass('grouped');
        }

        clonedGroup.attr('data-index', groupItemsLength);
        clonedGroup.append($this._getRemoveIcon());

        parentGroupDiv.find('.multiple-group-content').append(clonedGroup);
      }
    });

  }

  _deleteMultipleItem() {
    const $this = this;
    $(document).on('click', '.remove-multiple-item', function () {

      const parentData = $(this).closest('.core-multiple-inputs');

      $(this).closest('.group-item').remove();
      $this._resetInputName(parentData);
    })
  }

  _resetInputName(parentData) {

    let i = 1;
    parentData.find('.group-item:not(:first)').each(function (groupKey, groupItem) {

      $(groupItem).find(':input').each(function (k, input) {

        const dataNum = $(groupItem).attr('data-index');
        const formGroup = $(input).closest('.form-group');
        const errorSpan = formGroup.find('.validation-error')

        const replacedName = $(input).attr('name').replace(dataNum, i);
        const replacedErrorName = errorSpan.attr('data-name').replace(dataNum, i);

        $(input).attr('name', replacedName);
        errorSpan.attr('data-name', replacedErrorName);
      });

      $(groupItem).attr('data-index', i);

      i++;
    });
  }

  _getRemoveIcon() {
    return `<i class="flaticon-circle remove-multiple-item"></i>`;
  }

  init() {

    if ($('.' + this.coreParentClass).length) {
      this._addMultipleItem();
      this._deleteMultipleItem();
    }
  }
}

new MultipleInputs().init();
