$(function () {

  select2Init();

  datepickerInit();

  datetimePickerInit();

  ckEditorInit();

  openMenu();

});

function select2Init() {
  $('.select2').select2({
    placeholder: $trans('__dashboard.label.select')
  });
}

function ckEditorInit() {
  const ckeditorEls = document.querySelectorAll('.ckeditor5');
  ckeditorEls.forEach((item) => {
    ClassicEditor.create(item, {
      // cloudServices: {
      //   tokenUrl: 'https://33333.cke-cs.com/token/dev/ijrDsqFix838Gh3wGO3F77FSW94BwcLXprJ4APSp3XQ26xsUHTi0jcb1hoBt',
      //   uploadUrl: 'https://33333.cke-cs.com/easyimage/upload/',
      // },
    }).catch((error) => {
      console.error(error);
    });
  });
}

function datepickerInit() {

  const datepickerInputs = $('.datepicker');

  if(datepickerInputs.length){
    datepickerInputs.attr('autocomplete', 'off');
    datepickerInputs.datepicker({
      // eslint-disable-next-line no-undef
      format: $dashboardDates.js.date_format_front,
      orientation: 'bottom',
    }).on('changeDate', (ev) => {
      datepickerInputs.datepicker('hide');
    });

    $(document).on('focus', '.datepicker', function () {
      $(this).mask('00.00.0000');
    });
  }
}

function datetimePickerInit() {

  const datetimePickerInputs = $('.datetimepicker');

  // datetimePickerInputs.datetimepicker();
}

function openMenu() {
  $('.open-menu').click(function () {
    $('.page').toggleClass('left-menu-opened');
    $('.open-menu').toggleClass('open-menu-opened');
  });
}
