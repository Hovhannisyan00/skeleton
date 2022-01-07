$(function () {

  select2Init();

  openMenu();

});

function select2Init() {
  $('.select2').select2({
    placeholder: $trans('__dashboard.label.select')
  });
}

function openMenu() {
  $('.open-menu').click(function () {
    $('.page').toggleClass('left-menu-opened');
    $('.open-menu').toggleClass('open-menu-opened');
  });
}
