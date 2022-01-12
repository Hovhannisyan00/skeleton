let _selfFileUploader;

// eslint-disable-next-line no-underscore-dangle,no-unused-vars
class FileUploader {
  constructor() {
    this.init();
  }

  init() {
    _selfFileUploader = this;
    this.deleteFileEvent();
    this.$_functions();
  }

  $_functions() {
    $('body').on('click', '.__delete__file__btn', this.deleteFileHandler);
    $('input[type=file]').change(this.fileChangeHandle.bind(this));
  }

  getAttribute(qualifiedDataName) {
    return this.$el.getAttribute(`data-${qualifiedDataName}`);
  }

  fileChangeHandle() {
    this.$el = event.target;
    this.$fileListEl = $(this.$el).siblings('div.__file__list__default');
    this.$fileErrorBox = $(this.$el).siblings('div.error-messages-block');
    this.$fileHiddenInputsBox = $(this.$el).siblings('.hidden-file-inputs');
    this.resetUploader();
    this.fileData = this.$el.files;
    this.removeOldUploadedFiles();
    this.generateFormDataForFiles();
    this.$el.value = '';
  }

  removeOldUploadedFiles() {
    this.is_multiple = this.$el.getAttribute('multiple') !== null;

    if (!this.is_multiple) {
      $(this.$el).siblings('.__uploaded__files').remove();
    }
  }

  resetUploader() {
    this.$fileListEl.html('');
    this.$fileErrorBox.find('ul').html('');
    this.$fileErrorBox.hide();
    this.$fileHiddenInputsBox.html('');
  }

  generateFormDataForFiles() {
    if (this.fileData) {
      this.inputName = this.getAttribute('name');
      const configKey = this.getAttribute('config-key');
      // eslint-disable-next-line no-restricted-syntax
      for (const [key, file] of Object.entries(this.fileData)) {
        const formData = new FormData();
        formData.append('config_key', `${configKey}.${this.inputName}`);
        formData.append('file', file);
        this.sendData(formData, key);
      }
    }
  }

  async sendData(formData, fileIndex) {
    // eslint-disable-next-line no-undef
    this.createPreviewBlock(fileIndex);
    // eslint-disable-next-line no-undef
    await axios.post(route('dashboard.files.storeTempFile'), formData, {
      onUploadProgress: (progressEvent) => {
        const totalLength = progressEvent.lengthComputable ? progressEvent.total : progressEvent.target.getResponseHeader('content-length') || progressEvent.target.getResponseHeader('x-decompressed-content-length');
        if (totalLength !== null) {
          const progress = Math.round((progressEvent.loaded * 100) / totalLength);
          this.progressBar(progress, fileIndex);
        }
      },
    })
      .then((resp) => {
        resp = resp.data;
        this.setPreviewValue(resp, fileIndex);
        this.appendDeleteBtn(fileIndex);
        this.createHiddenInputs(resp);
      })
      .catch((error) => {
        this.errorHandler(error, fileIndex);
        this.appendDeleteBtn(fileIndex, true);
      });
  }

  setPreviewValue(fileInfo, fileIndex) {
    const fileItem = $(this.$fileListEl)
      .find(`.file__item[data-index=${fileIndex}]`);

    if (fileInfo.file_type === 'file') {
      fileItem.css({
        width: 'auto',
        height: 'auto',
      });
    }

    fileItem.html(this.createHtmlForFile(fileInfo));
  }

  appendDeleteBtn(fileIndex, is_error = false) {
    const fileItem = $(this.$fileListEl).find(`.file__item[data-index=${fileIndex}]`);
    const view = ` <button class="position-absolute __delete__file __delete__file__btn"
                    data-index="${fileIndex}"
                    data-event-name="deleteFileItemEvent"
                    type="button">x</button>
                    `;
    fileItem.append(view);
  }

  createHiddenInputs(file) {
    let arraySymbol = '';

    if (this.is_multiple) {
      arraySymbol = '[]';
    }

    this.$fileHiddenInputsBox.append(`<input type="hidden" name="${this.inputName}${arraySymbol}" value="${file.name}">`);
  }

  errorHandler(error, fileIndex) {
    const fileItem = $(this.$fileListEl).find(`.file__item[data-index=${fileIndex}]`);
    fileItem.find('.progress-bar').addClass('bg-danger');

    if (error.response && error.response.data.errors) {
      this.$fileErrorBox.show();
      error = error.response.data;
      // eslint-disable-next-line no-restricted-syntax
      for (const [key, value] of Object.entries(error.errors)) {
        this.$fileErrorBox.find('ul').append(`<li data-index="${fileIndex}">File :${fileIndex} ${value}</li>`);
      }
    }
  }

  progressBar(progress, fileIndex) {
    $(this.$fileListEl)
      .find(`.file__item[data-index=${fileIndex}] .file__progress .progress-bar`)
      .css({ width: `${progress}%` })
      .attr('aria-valuenow', progress)
      .html(`${progress}%`);
  }

  createPreviewBlock(fileIndex) {
    const preview = `
            <div class="file__item d-flex justify-content-center position-relative mt-2" data-index="${fileIndex}">
                <div class="progress file__progress ">
                    <div class="progress-bar"
                         role="progressbar"
                         style="width: 0%;"
                         aria-valuenow="0"
                         aria-valuemin="0"
                         aria-valuemax="100">
                        0%
                    </div>
                </div>
            </div>
    `;

    this.$fileListEl.append(preview);
  }

  // eslint-disable-next-line class-methods-use-this
  createHtmlForFile(fileInfo) {
    switch (fileInfo.file_type) {
      case 'image':
        return `<img src="${fileInfo.file_url}" alt="${fileInfo.original_name}" class="upload-file-img">`;
      default:
        return `<span class="mr-5 text-primary p-2">${fileInfo.original_name}</span>`;
    }
  }

  // Delete functions start
  deleteFileHandler() {
    const index = $(this).data('index');
    _selfFileUploader.$fileErrorBox.find(`ul li[data-index="${index}"]`).remove();
    if (!_selfFileUploader.$fileErrorBox.find('ul li').length) {
      _selfFileUploader.$fileErrorBox.hide();
    }
    $(this).closest('.file__item').remove();
    _selfFileUploader.deleteFileEvent();
  }

  deleteFileEvent() {
    window.addEventListener('deleteFileItemInDbEvent', (event) => {
      const el = event.detail.element;
      const boxLength = $(el).parents('.__uploaded__files').find('.file__item').length;
      if (boxLength < 2) {
        $(el).parents('.__uploaded__files').remove();
      }
      $(el).parents('.file__item').remove();
    });
  }
  // Delete functions end
}

new FileUploader();
