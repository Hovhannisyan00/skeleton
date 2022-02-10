class Modal {
  constructor(modalId, options) {
    this.options = options;
    this.modalId = modalId;
    this.modalEl = $(`#${modalId}`);
    this.modalBody = this.modalEl.find('.modal-body');
  }

  beforeShow(callback) {
    this.modalEl.on('show.bs.modal', callback);
  }

  beforeHide(callback) {
    this.modalEl.on('hide.bs.modal', callback);
  }

  save(callback) {
    this.modalEl.find('.save-btn').click(callback);
  }

  cancel(callback) {
    this.modalEl.find('.cancel-btn').click(callback);
  }

  show() {
    this.modalEl.modal('show');
  }

  hide() {
    this.modalEl.modal('hide');
  }

  clickItem(item, callback) {
    this.modalEl.find(item).click(callback);
  }

  getModalElement() {
    return this.modalEl;
  }
}
