window.$func = {
  inArray(needle, haystack, field = null) {
    const { length } = haystack;
    for (let i = 0; i < length; i++) {
      if (field) {
        if (haystack[i][field] == needle) return true;
      } else if (haystack[i] == needle) return true;
    }
    return false;
  },

  fullName(obj, firstLetter = null) {
    if (obj) {
      if (!firstLetter) {
        if (obj.last_name) return `${obj.first_name || ''} ${obj.last_name || ''}`;

        return obj.first_name;
      }
      if (obj.last_name) return `${obj.first_name.slice(0, 1).toUpperCase() || ''} ${obj.last_name.slice(0, 1).toUpperCase() || ''}`;

      if (obj.first_name) return obj.first_name.slice(0, 1).toUpperCase();

      return '';
    }

    return '';
  },

  numberFormat(number, decimals = 2, dec_point = ',', thousands_sep = '.') {	// Format a number with grouped thousands
    let i; let j; let kw; let kd; let
      km;

    if (isNaN(decimals = Math.abs(decimals))) {
      decimals = 2;
    }
    if (dec_point == undefined) {
      dec_point = ',';
    }
    if (thousands_sep == undefined) {
      thousands_sep = '.';
    }

    i = `${parseInt(number = (+number || 0).toFixed(decimals))}`;
    if (!isNaN(i)) {
      if ((j = i.length) > 3) {
        j %= 3;
      } else {
        j = 0;
      }

      km = (j ? i.substr(0, j) + thousands_sep : '');
      kw = i.substr(j).replace(/(\d{3})(?=\d)/g, `$1${thousands_sep}`);
      // kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).slice(2) : "");
      kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : '');

      return km + kw + kd;
    }

    return '';
  },

  pluck(array, key) {
    return array.map((o) => o[key]);
  },

  isFutureDate(value) {
    const now = new Date();
    const target = new Date(value);

    if (target.getFullYear() > now.getFullYear()) {
      return true;
    } if (target.getFullYear() == now.getFullYear()) {
      if (target.getMonth() > now.getMonth()) {
        return true;
      } if (target.getMonth() == now.getMonth()) {
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

  jqueryMask() {
    $('.kt_date_input').mask('00.00.0000', {
      // placeholder: "dd/mm/yyyy"
    });

    $('.kt_time_input').mask('00:00:00', {
      // placeholder: "hh:mm:ss"
    });

    $('.kt_date_time_input').mask('00/00/0000 00:00:00', {
      // placeholder: "dd/mm/yyyy hh:mm:ss"
    });

    $('.kt_cep_input').mask('00000-000', {
      // placeholder: "99999-999"
    });

    $('.kt_num').mask('000000000000', {
      // placeholder: ""
    });

    $('.kt_phone_input').mask('0000-0000', {
      // placeholder: "9999-9999"
    });

    $('.kt_phone_with_ddd_input').mask('(00) 0000-0000', {
      placeholder: '(99) 9999-9999',
    });

    $('.kt_cpf_input').mask('000.000.000-00', {
      reverse: true,
    });

    $('.kt_cnpj_input').mask('00.000.000/0000-00', {
      reverse: true,
    });

    $('.kt_money_input').mask('000.000.000.000.000,00', {
      reverse: true,
    });

    $('.kt_money_input_2').mask('000.000.000.000.000,0000000000', {
      reverse: true,
      // precision: 2
    });

    $('.kt_money2_input').mask('#.##0,00', {
      reverse: true,
    });

    $('.kt_money3_input').mask('000.000.000.000.000,000000', {
      reverse: true,
    });

    $('.kt_percent_input').mask('##0,00%', {
      reverse: true,
    });

    $('.kt_clear_if_not_match_input').mask('00/00/0000', {
      clearIfNotMatch: true,
    });

    $('.mask-number-input-negetive').mask({
      allowNegative: true,
      thousands: '.',
      decimal: ',',
      affixesStay: false,
      precision: 2,
    });
  },

  shownDsTab() {
    $('a[data-toggle="pill"]').on('shown.bs.tab', (e) => {
      $($.fn.dataTable.tables(true)).DataTable()
        .columns.adjust()
        .responsive.recalc();
    });
  },

  getAllUrlParams(url = null) {
    if (!url) {
      url = window.location.href;
    }

    let queryString = url ? url.split('?')[1] : window.location.search.slice(1);

    const obj = {};

    if (queryString) {
      queryString = queryString.split('#')[0];

      const arr = queryString.split('&');

      for (let i = 0; i < arr.length; i++) {
        const a = arr[i].split('=');

        var paramNum = undefined;
        let paramName = a[0].replace(/\[\d*\]/, (v) => {
          paramNum = v.slice(1, -1);
          return '';
        });

        let paramValue = typeof (a[1]) === 'undefined' ? true : a[1];

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

  historyPushState(params = null, is_clear = null, page = null) {
    if (is_clear) {
      history.pushState(null, null, page);
    } else {
      let url = ''; let
        symbol = '?';

      for (const key in params) {
        url += `${symbol}${key}=${params[key]}`;
        symbol = '&';
      }

      history.pushState(params, '', url);
    }
  },

  setCitiesName(cities, is_second = null) {
    let citiesName = '';

    if (cities) {
      cities.map((city, key) => {
        if (city) {
          if (is_second) citiesName += `${key ? ' > ' : ''} ${city.current_name}`;
          else citiesName += `${key ? ' <=> ' : ''} ${city.current_name}`;
        }
      });
    }

    return citiesName;
  },

};
