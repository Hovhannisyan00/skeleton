const options = {
  pathOptions: {
    searchPath: route('dashboard.articles.getListData'),
    deletePath: route('dashboard.articles.destroy', ':id'),
    editPath: route('dashboard.articles.edit', ':id'),
  },

  actions: {
    show: false,
  },

  // Its a Example for show column render data type (no open comment!!)
  /*columnsRender: {
    show_status: {
      render(showStatus) {
        return `<span class="show-status-${showStatus}">${$trans('__dashboard.select.option.show_statusa_'+showStatus)}</span>`;
      }
    }
  }*/

};
// eslint-disable-next-line no-new,no-undef
new DataTable(options);
