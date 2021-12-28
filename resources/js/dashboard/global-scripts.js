require('../helpers/func');
// datepicker end
// eslint-disable-next-line no-underscore-dangle
const responseMessage = localStorage.getItem('_message');
if (responseMessage) {
  // eslint-disable-next-line no-undef
  El.Message.success(responseMessage);
}
localStorage.removeItem('_message');

// datepicker
$('.datepicker').attr('autocomplete', 'off');
$('.datepicker').datepicker({
  // eslint-disable-next-line no-undef
  format: $dashboardDates.js.date_format_front,
  orientation: 'bottom',
}).on('changeDate', (ev) => {
  $('.datepicker').datepicker('hide');
});
$(document).on('focus', '.datepicker', function () {
  $(this).mask('00.00.0000');
});

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
