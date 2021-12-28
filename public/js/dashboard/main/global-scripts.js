/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/helpers/func.js":
/*!**************************************!*\
  !*** ./resources/js/helpers/func.js ***!
  \**************************************/
/***/ (() => {

window.$func = {
  inArray: function inArray(needle, haystack) {
    var field = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
    var length = haystack.length;

    for (var i = 0; i < length; i++) {
      if (field) {
        if (haystack[i][field] == needle) return true;
      } else if (haystack[i] == needle) return true;
    }

    return false;
  },
  fullName: function fullName(obj) {
    var firstLetter = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;

    if (obj) {
      if (!firstLetter) {
        if (obj.last_name) return "".concat(obj.first_name || '', " ").concat(obj.last_name || '');
        return obj.first_name;
      }

      if (obj.last_name) return "".concat(obj.first_name.slice(0, 1).toUpperCase() || '', " ").concat(obj.last_name.slice(0, 1).toUpperCase() || '');
      if (obj.first_name) return obj.first_name.slice(0, 1).toUpperCase();
      return '';
    }

    return '';
  },
  numberFormat: function numberFormat(number) {
    var decimals = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 2;
    var dec_point = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : ',';
    var thousands_sep = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : '.';
    // Format a number with grouped thousands
    var i;
    var j;
    var kw;
    var kd;
    var km;

    if (isNaN(decimals = Math.abs(decimals))) {
      decimals = 2;
    }

    if (dec_point == undefined) {
      dec_point = ',';
    }

    if (thousands_sep == undefined) {
      thousands_sep = '.';
    }

    i = "".concat(parseInt(number = (+number || 0).toFixed(decimals)));

    if (!isNaN(i)) {
      if ((j = i.length) > 3) {
        j %= 3;
      } else {
        j = 0;
      }

      km = j ? i.substr(0, j) + thousands_sep : '';
      kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1".concat(thousands_sep)); // kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).slice(2) : "");

      kd = decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : '';
      return km + kw + kd;
    }

    return '';
  },
  pluck: function pluck(array, key) {
    return array.map(function (o) {
      return o[key];
    });
  },
  isFutureDate: function isFutureDate(value) {
    var now = new Date();
    var target = new Date(value);

    if (target.getFullYear() > now.getFullYear()) {
      return true;
    }

    if (target.getFullYear() == now.getFullYear()) {
      if (target.getMonth() > now.getMonth()) {
        return true;
      }

      if (target.getMonth() == now.getMonth()) {
        if (target.getDate() >= now.getDate()) {
          return true;
        }

        return false;
      }
    } else {
      return false;
    }
  },

  /* numberFormat(amount, decimals = 2, decimal = ',', thousands = '.') {
        try {
            if (amount) {
                // string = parseInt(string);
                amount = Math.round((amount) * 100) / 100;
                let numbers = amount.toString().match(/\d+/g).join([]);
                numbers = numbers.padStart(decimals + 1, "0");
                let splitNumbers = numbers.split("").reverse();
                let mask = '';
                splitNumbers.forEach(function (d, i) {
                    if (i == decimals) {
                        mask = decimal + mask;
                    }
                    if (i > (decimals + 1) && ((i - 2) % (decimals + 1)) == 0) {
                        mask = thousands + mask;
                    }
                    mask = d + mask;
                });
                 return mask;
            }
             /!*if (amount){
               let decimalCount = Math.abs(decimals);
                decimalCount = isNaN(decimals) ? 2 : decimals;
                 const negativeSign = amount < 0 ? "-" : "";
                 let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimals)).toString();
                let j = (i.length > 3) ? i.length % 3 : 0;
                 return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimals ? decimal + Math.abs(amount - i).toFixed(decimals).slice(2) : "");
            }*!/
             return ''
         } catch (e) {
            console.log(amount)
        }
     } */
  jqueryMask: function jqueryMask() {
    $('.kt_date_input').mask('00.00.0000', {// placeholder: "dd/mm/yyyy"
    });
    $('.kt_time_input').mask('00:00:00', {// placeholder: "hh:mm:ss"
    });
    $('.kt_date_time_input').mask('00/00/0000 00:00:00', {// placeholder: "dd/mm/yyyy hh:mm:ss"
    });
    $('.kt_cep_input').mask('00000-000', {// placeholder: "99999-999"
    });
    $('.kt_num').mask('000000000000', {// placeholder: ""
    });
    $('.kt_phone_input').mask('0000-0000', {// placeholder: "9999-9999"
    });
    $('.kt_phone_with_ddd_input').mask('(00) 0000-0000', {
      placeholder: '(99) 9999-9999'
    });
    $('.kt_cpf_input').mask('000.000.000-00', {
      reverse: true
    });
    $('.kt_cnpj_input').mask('00.000.000/0000-00', {
      reverse: true
    });
    $('.kt_money_input').mask('000.000.000.000.000,00', {
      reverse: true
    });
    $('.kt_money_input_2').mask('000.000.000.000.000,0000000000', {
      reverse: true // precision: 2

    });
    $('.kt_money2_input').mask('#.##0,00', {
      reverse: true
    });
    $('.kt_money3_input').mask('000.000.000.000.000,000000', {
      reverse: true
    });
    $('.kt_percent_input').mask('##0,00%', {
      reverse: true
    });
    $('.kt_clear_if_not_match_input').mask('00/00/0000', {
      clearIfNotMatch: true
    });
    $('.mask-number-input-negetive').mask({
      allowNegative: true,
      thousands: '.',
      decimal: ',',
      affixesStay: false,
      precision: 2
    });
  },
  shownDsTab: function shownDsTab() {
    $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
      $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();
    });
  },
  getAllUrlParams: function getAllUrlParams() {
    var url = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

    if (!url) {
      url = window.location.href;
    }

    var queryString = url ? url.split('?')[1] : window.location.search.slice(1);
    var obj = {};

    if (queryString) {
      queryString = queryString.split('#')[0];
      var arr = queryString.split('&');

      for (var i = 0; i < arr.length; i++) {
        var a = arr[i].split('=');
        var paramNum = undefined;
        var paramName = a[0].replace(/\[\d*\]/, function (v) {
          paramNum = v.slice(1, -1);
          return '';
        });
        var paramValue = typeof a[1] === 'undefined' ? true : a[1];
        paramName = paramName.toLowerCase();
        paramValue = paramValue.toLowerCase();

        if (obj[paramName]) {
          if (typeof obj[paramName] === 'string') {
            obj[paramName] = [obj[paramName]];
          }

          if (typeof paramNum === 'undefined') {
            obj[paramName].push(paramValue);
          } else {
            obj[paramName][paramNum] = paramValue;
          }
        } else {
          obj[paramName] = paramValue;
        }
      }
    }

    return obj;
  },
  historyPushState: function historyPushState() {
    var params = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
    var is_clear = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
    var page = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;

    if (is_clear) {
      history.pushState(null, null, page);
    } else {
      var url = '';
      var symbol = '?';

      for (var key in params) {
        url += "".concat(symbol).concat(key, "=").concat(params[key]);
        symbol = '&';
      }

      history.pushState(params, '', url);
    }
  },
  setCitiesName: function setCitiesName(cities) {
    var is_second = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
    var citiesName = '';

    if (cities) {
      cities.map(function (city, key) {
        if (city) {
          if (is_second) citiesName += "".concat(key ? ' > ' : '', " ").concat(city.current_name);else citiesName += "".concat(key ? ' <=> ' : '', " ").concat(city.current_name);
        }
      });
    }

    return citiesName;
  }
};

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!**************************************************!*\
  !*** ./resources/js/dashboard/global-scripts.js ***!
  \**************************************************/
__webpack_require__(/*! ../helpers/func */ "./resources/js/helpers/func.js"); // datepicker end
// eslint-disable-next-line no-underscore-dangle


var responseMessage = localStorage.getItem('_message');

if (responseMessage) {
  // eslint-disable-next-line no-undef
  El.Message.success(responseMessage);
}

localStorage.removeItem('_message'); // datepicker

$('.datepicker').attr('autocomplete', 'off');
$('.datepicker').datepicker({
  // eslint-disable-next-line no-undef
  format: $dashboardDates.js.date_format_front,
  orientation: 'bottom'
}).on('changeDate', function (ev) {
  $('.datepicker').datepicker('hide');
});
$(document).on('focus', '.datepicker', function () {
  $(this).mask('00.00.0000');
}); // ClassicEditor

var ckeditorEls = document.querySelectorAll('.ckeditor5');
ckeditorEls.forEach(function (item) {
  ClassicEditor.create(item, {
    cloudServices: {
      tokenUrl: 'https://33333.cke-cs.com/token/dev/ijrDsqFix838Gh3wGO3F77FSW94BwcLXprJ4APSp3XQ26xsUHTi0jcb1hoBt',
      uploadUrl: 'https://33333.cke-cs.com/easyimage/upload/'
    }
  })["catch"](function (error) {
    console.error(error);
  });
});
})();

/******/ })()
;