// eslint-disable-next-line no-unused-vars
class DataTable {
  constructor(options = {}, tableId = '#__data__table') {
    this.initVariables(options, tableId);
    this.columnDefaultRender(options);
    this.init();
  }

  initVariables(options, tableId) {
    this.tableId = tableId;
    this.tableEl = $(tableId);
    this.options = options;
    this.searchFormId = options.searchFormId ?? 'dataTable__search__form';
    this.searchFormEl = $(`#${this.searchFormId}`);
    this.searchData = {};
    this.pathOptions = options.pathOptions;
  }

  columnDefaultRender(options) {
    const showStatusRender = {
      show_status: {
        render(showStatus) {
          return `<span class="show-status-${showStatus}">${$trans(`__dashboard.select.option.show_status_${showStatus}`)}</span>`;
        },
      },
    };

    options.columnsRender = { ...showStatusRender, ...options.columnsRender };
  }

  actions() {
    const replaceId = (id, type) => this.pathOptions[`${type}Path`].replace(':id', id);

    const self = this;
    const defaultActions = {
      edit(row) {
        return `<a href="${replaceId(row.id, 'edit')}" class="btn" title="Edit">
                    <i class="flaticon-edit"></i>
                </a>`;
      },

      show(row) {
        return `<a href="${replaceId(row.id, 'show')}" class="btn" title="Show">
                   <i class="flaticon-eye"></i>
                </a>`;
      },

      clone(row) {
        if (self.pathOptions.clonePath) {
          return `<a href="${replaceId(row.id, 'clone')}" class="btn" title="Duplicate">
                   <i class="fas fa-copy fa-fw"></i>
                </a>`;
        }

        return '';
      },

      delete(row) {
        return `<button type="button" data-url="${replaceId(row.id, 'delete')}" data-event-name="deleteDataTableRow" class="btn __confirm__delete__btn" title="Delete">
                    <i class="flaticon2-trash"></i>
                </button>`;
      },
    };

    this.options.actions = { ...defaultActions, ...this.options.actions };
  }

  renderActions(data, type, row, meta) {
    let actions = '';
    // eslint-disable-next-line no-restricted-syntax
    for (const [key, func] of Object.entries(this.options.actions)) {
      if (typeof func !== 'boolean') actions += func(row);
    }
    return `<div class="text-center table-buttons">${actions}</div>`;
  }

  columnRenderRelation(column) {
    const columnName = column.data;
    if (this.options.relations && this.options.relations[columnName]) {
      const relationName = this.options.relations[columnName];
      column.render = (data) => {
        let text = '';

        if (data && !Array.isArray(data)) {
          // if relation is objected
          if (typeof relationName !== 'string') {
            const relationKey = Object.keys(relationName)[0] || '';

            if (data[relationKey]) {
              return data[relationKey][relationName[relationKey]];
            }
          }

          return data[relationName] || '';
        }

        if (Array.isArray(data)) {
          data.map((item, index) => {
            if (typeof relationName !== 'string') {
              const relationKey = Object.keys(relationName)[0] || '';
              if (item[relationKey]) {
                const relVal = item[relationKey][relationName[relationKey]];
                text += index ? `, ${relVal}` : relVal;
              }
            } else {
              text += index ? `, ${item[relationName]}` : item[relationName];
            }
          });

          return text;
        }

        return '';
      };
    }
    return column;
  }

  actionsColumn() {
    return {
      data: null,
      orderable: false,
      sortable: false,
      render: this.renderActions.bind(this),
    };
  }

  mapTableColumns(columns = []) {
    const fields = this.tableEl.find('thead th');
    // eslint-disable-next-line array-callback-return
    fields.map((key, field) => {
      const columnName = $(field).data('key');
      let column = {
        data: columnName,
        name: columnName,
        orderable: $(field).data('orderable') ?? true,
      };

      const { columnsRender } = this.options;

      if (columnsRender && columnsRender[columnName]) {
        column = { ...column, ...columnsRender[column.data] };
      }

      if (columnName) {
        columns.push(this.columnRenderRelation(column));
      }
    });
    return columns;
  }

  getAndGenerateColumns() {
    const columns = this.mapTableColumns();
    if (typeof this.options.noActions === 'undefined' || !this.options.noActions) {
      columns.push(this.actionsColumn());
    }
    return columns;
  }

  // eslint-disable-next-line class-methods-use-this
  generateRequestData(data) {
    const orderColumn = data.order[0];
    return {
      'order[sort_by]': data.columns[orderColumn.column].name,
      'order[sort_desc]': orderColumn.dir,
      perPage: data.length,
      start: data.start,
      ...this.searchData,
    };
  }

  async ajaxSend(data, callback) {
    this.resetForm();
    // eslint-disable-next-line no-undef
    await axios(this.pathOptions.searchPath, { params: this.generateRequestData(data) })
      .then((resp) => {
        callback(resp.data);
      }).catch(this.errorHandler.bind(this));
    this.searchFromLoader();
    this.searchFormReset();
  }

  errorHandler(error) {
    error = error.response.data;
    if (error) {
      // eslint-disable-next-line no-restricted-syntax
      for (const [key, value] of Object.entries(error.errors)) {
        this.searchFormEl.find(`.validation-error[data-name="${key.substring(2)}"]`).html(value);
      }
    }
  }

  resetForm() {
    this.searchFormEl.find('.validation-error').html('');
  }

  generateOptions() {
    const options = {
      processing: true,
      serverSide: true,
      searching: false,
      ajax: this.ajaxSend.bind(this),
      order: [[0, 'desc']],
      pageLength: 25,
      columns: this.getAndGenerateColumns(),
    };
    this.options = { ...options, ...this.options };
  }

  tableReload() {
    this.table.ajax.reload();
  }

  eventListener() {
    window.addEventListener('deleteDataTableRow', () => {
      this.tableReload();
    });
  }

  searchFromLoader(is) {
    const spinner = this.searchFormEl.find('button.search__form__btn .spinner-border');
    if (is) spinner.css({ display: 'inline-block' });
    else spinner.hide();
  }

  searchFormReset() {
    this.searchFormEl.find('.reset__form__btn').click(() => {
      this.searchData = {};
      this.searchFormEl[0].reset();
      this.tableReload();
    });
  }

  searchFormSubmit(event) {
    event.preventDefault();
    const el = event.target;
    this.searchData = {};

    this.searchFromLoader(true);
    const searchData = $(el).serializeArray();

    searchData.map((item, id) => {
      let addArrayBrackets = '';
      if ($(el).find(`select[name="${item.name}"][multiple]`).length) {
        addArrayBrackets = `[${id}]`;
      }

      this.searchData[`f[${item.name}]${addArrayBrackets}`] = item.value;
    });

    this.tableReload();
  }

  defaultSearchData() {
    const self = this;
    $.each(this.searchFormEl.find('.default-search'), (k, item) => {
      self.searchData[`f[${$(item).attr('name')}]`] = $(item).val();
    });
  }

  createDataTable() {
    this.table = this.tableEl.DataTable(this.options);
  }

  $_functions() {
    this.createDataTable();
    this.searchFormEl.submit(this.searchFormSubmit.bind(this));
  }

  init() {
    this.actions();
    this.defaultSearchData();
    this.generateOptions();
    this.eventListener();
    this.$_functions();
  }
}

