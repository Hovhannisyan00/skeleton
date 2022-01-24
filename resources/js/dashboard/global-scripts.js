require('../helpers/func');

// eslint-disable-next-line no-underscore-dangle
const responseMessage = localStorage.getItem('_message');
if (responseMessage) {
  // eslint-disable-next-line no-undef
  El.Message.success(responseMessage);
}
localStorage.removeItem('_message');


// ClassicEditor
const ckeditorEls = document.querySelectorAll('.ckeditor5');
ckeditorEls.forEach((item) => {
  ClassicEditor.create(item, {
    cloudServices: {
      tokenUrl: 'https://33333.cke-cs.com/token/dev/ijrDsqFix838Gh3wGO3F77FSW94BwcLXprJ4APSp3XQ26xsUHTi0jcb1hoBt',
      uploadUrl: 'https://33333.cke-cs.com/easyimage/upload/',
    },
  }).catch((error) => {
    console.error(error);
  });
});
