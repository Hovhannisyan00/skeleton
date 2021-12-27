const options = {
  pathOptions: {
    searchPath: route('dashboard.articles.getListData'),
    deletePath: route('dashboard.articles.destroy', ':id'),
    editPath: route('dashboard.articles.edit', ':id'),
  },

  actions: {
    show: false,
  },
};
// eslint-disable-next-line no-new,no-undef
new DataTable(options);
