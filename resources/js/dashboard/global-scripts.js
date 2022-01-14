require('../helpers/func');

// eslint-disable-next-line no-underscore-dangle
const responseMessage = localStorage.getItem('_message');
if (responseMessage) {
  // eslint-disable-next-line no-undef
  El.Message.success(responseMessage);
}
localStorage.removeItem('_message');


