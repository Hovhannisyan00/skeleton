// eslint-disable-next-line no-underscore-dangle
let _selfFormRequest;

// eslint-disable-next-line no-unused-vars
class FormRequest {
  constructor(options, formId = '__form__request') {
    this.options = options;
    this.formId = formId;
    this.formEl = $(`#${formId}`);
    this.init();
  }

  async formSubmit(e) {
    e.preventDefault();
    const method = $(this).attr('method');
    const url = $(this).attr('action');
    let formData = new FormData(this);
    formData = _selfFormRequest.generateFormDataForFiles(formData);
    await _selfFormRequest.sendData(method, url, formData);
  }

  async sendData(method, url, formData) {
    _selfFormRequest.formEl.find('.validation-error').html('');
    this.formRequestLoader();
    // eslint-disable-next-line no-undef
    await axios.post(url, formData)
      .then(_selfFormRequest.successHandler.bind(_selfFormRequest))
      .catch(_selfFormRequest.errorHandler.bind(_selfFormRequest));
    this.formRequestLoader(false);
  }

  generateFormDataForFiles(formData) {
    if (this.fileData) {
      // eslint-disable-next-line no-restricted-syntax
      for (const [key, files] of Object.entries(this.fileData)) {
        const inputName = key.replace('[]', '');
        if (Array.isArray(files)) {
          // eslint-disable-next-line array-callback-return
          files.map((item, index) => {
            formData.append(`${inputName}[${index}]`, item);
          });
        } else {
          formData.append(inputName, files);
        }
      }
    }
    return formData;
  }

  // eslint-disable-next-line class-methods-use-this
  successHandler(resp) {
    resp = resp.data;
    if (resp.redirectUrl) {
      localStorage.setItem('_message', resp.message);
      location.href = resp.redirectUrl;
    }
  }

  errorHandler(error) {
    if (error.response && error.response.data.errors) {
      error = error.response.data;

      this.formEl.find('.validation-error').removeClass('has-error');
      // eslint-disable-next-line no-restricted-syntax
      for (const [key, value] of Object.entries(error.errors)) {
        this.formEl.find(`.validation-error[data-name="${key}"]`).addClass('has-error');
        this.formEl.find(`.validation-error[data-name="${key}"]`).html(value);
        this.formEl.find(`.validation-error[data-name="${key}[]"]`).html(value);
      }

      this.scrollToFirstError();
    }
  }

  scrollToFirstError() {
    const firstError = this.formEl.find('.validation-error.has-error').first();

    if (firstError.closest('.tab-pane')) {
      $(`.nav-tabs a[href="#${firstError.closest('.tab-pane').attr('id')}"]`).tab('show');
    }

    setTimeout(() => {
      $('html, body').animate({
        scrollTop: firstError.offset().top - 200,
      }, 300);
    }, 150);
  }

  formRequestLoader(is = true) {
    const spinner = this.formEl.find('button.form__request__send__btn .spinner-border');
    const btn = this.formEl.find('button.form__request__send__btn');
    if (is) {
      spinner.css({ display: 'inline-block' });
      btn.prop('disabled', true);
    } else {
      spinner.hide();
      btn.prop('disabled', false);
    }
  }

  clickSubmit() {
    this.formEl.submit(this.formSubmit);
  }

  // File input
  fileInputs() {
    $(this.formEl).find('input[type=file]').change(this.fileChangeHandle);
  }

  async fileChangeHandle() {
    const { name, files } = this;
    const hasMultiple = this.hasAttribute('multiple');
    _selfFormRequest.fileData = {
      ..._selfFormRequest.fileData,
      [name]: hasMultiple ? Array.from(files) : files[0],
    };

    if (!hasMultiple) {
      $(this).siblings('.__uploaded__files').remove();
    }

    const fileListBox = $(this).parents('.file__uploader__box').find('.__file__list');
    await _selfFormRequest.showSelectedFiles(fileListBox, name);
    this.value = '';
    _selfFormRequest.resetFileDeleteBtnIndex(fileListBox);
  }

  // eslint-disable-next-line consistent-return
  showSelectedFiles(fileListBox, inputName) {
    this.appendOrDestroyFileList(fileListBox);
    // eslint-disable-next-line no-restricted-syntax
    let renderData = {
      inputName,
    };
    const files = this.fileData[inputName];

    if (Array.isArray(files)) {
      // eslint-disable-next-line array-callback-return
      files.map((item, index) => {
        renderData = {
          ...renderData,
          fileName: item.name,
          index,
          type: this.getFileType(item),
        };
        this.checkFileAndRender(fileListBox, item, renderData);
      });
    } else {
      renderData = {
        ...renderData,
        fileName: files.name,
        type: this.getFileType(files),
        index: inputName,
      };
      this.checkFileAndRender(fileListBox, files, renderData);
    }
  }

  checkFileAndRender(fileListBox, file, renderData) {
    if (this.getFileType(file) === 'image') {
      const reader = new FileReader();
      reader.onload = (e) => {
        renderData.base64 = e.target.result;
        this.appendOrDestroyFileList(fileListBox, renderData);
      };
      reader.readAsDataURL(file);
    } else {
      this.appendOrDestroyFileList(fileListBox, renderData);
    }
  }

  appendOrDestroyFileList(fileListBox, renderData = false) {
    if (renderData) {
      const view = `<div class="mr-2 position-relative file__item mb-2">
                        <button class="position-absolute delete__file__btn __confirm__delete__btn"
                        data-input-name="${renderData.inputName}"
                        data-index="${renderData.index}"
                        data-event-name="deleteFileItemEvent"
                        type="button">x</button>
                        ${this.createHtmlForFile(renderData)}
                    </div>`;
      fileListBox.append(view);
    } else fileListBox.html('');
  }

  // eslint-disable-next-line class-methods-use-this
  createHtmlForFile(renderData) {
    switch (renderData.type) {
      case 'image':
        return `<img src="${renderData.base64}" alt="${renderData.fileName}" width="100" height="100">`;
      default:
        return `<span class="mr-5 text-primary p-2">${renderData.fileName}</span>`;
    }
  }

  deleteFileEvent() {
    window.addEventListener('deleteFileItemEvent', (event) => {
      const el = event.detail.element;
      const inputName = $(el).attr('data-input-name');
      const index = parseInt($(el).attr('data-index'));
      const listBox = $(el).parents('.__file__list');
      if (typeof index !== 'string' && index) {
        this.fileData[inputName].splice(index, 1);
      } else {
        delete this.fileData[inputName];
      }
      $(el).parent().remove();
      this.resetFileDeleteBtnIndex(listBox);
    });
    window.addEventListener('deleteFileItemInDbEvent', (event) => {
      const el = event.detail.element;
      $(el).parents('.__uploaded__files').remove();
    });
  }

  // eslint-disable-next-line class-methods-use-this
  resetFileDeleteBtnIndex(listBox) {
    // eslint-disable-next-line array-callback-return
    listBox.find('.file__item').map((index, item) => {
      if (Number.isInteger($(item).find('.delete__file__btn').data('index'))) {
        $(item).find('.delete__file__btn').attr('data-index', index);
      }
    });
  }

  // eslint-disable-next-line class-methods-use-this
  getFileType(file) {
    if (file.type.match('image.*')) return 'image';

    if (file.type.match('video.*')) return 'video';

    if (file.type.match('audio.*')) return 'audio';

    return 'other';
  }

  init() {
    _selfFormRequest = this;
    this.fileInputs();
    this.clickSubmit();
    this.deleteFileEvent();
  }
}
