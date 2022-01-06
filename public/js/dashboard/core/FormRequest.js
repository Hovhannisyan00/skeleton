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
    const formData = new FormData(this);
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
      $('.form-group').removeClass('is-invalid');
      // eslint-disable-next-line no-restricted-syntax
      for (const [key, value] of Object.entries(error.errors)) {
        let hasErrorSpan = this.formEl.find(`.validation-error[data-name="${key}"]`);

        if(!hasErrorSpan.length){
          hasErrorSpan = this.formEl.find(`.validation-error[data-name="${key}[]"]`);
        }

        hasErrorSpan.closest('.form-group').addClass('is-invalid');
        hasErrorSpan.html(value).addClass('has-error');
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

  init() {
    _selfFormRequest = this;
    this.clickSubmit();
  }
}
