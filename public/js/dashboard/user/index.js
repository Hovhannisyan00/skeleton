//user
document.addEventListener('DOMContentLoaded', () => {
  window.route = (name, params = null) => {
    const route = routesData[name];
    let uri = route.uri.toString();

    route.parameters.map((item, index) => {
      if (Array.isArray(params)) {
        uri = uri.replace(`{${item}}`, params[index]);
      } else {
        if (index) {
          params = '';
        }
        uri = uri.replace(`{${item}}`, params);
      }
    });

    return `${location.origin}/${uri}`;
  };



const options = {
  pathOptions: {
    searchPath: route('dashboard.users.getListData'),
    deletePath: route('dashboard.users.destroy', ':id'),
    editPath: route('dashboard.users.edit', ':id'),
    showPath: route('dashboard.users.show', ':id'),
  },

  relations: {
    roles: 'name',
  },

  actions: {
    show: false,
  },
};
});
