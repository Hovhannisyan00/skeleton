import { Notification } from 'element-ui';

let check = true;

// eslint-disable-next-line no-undef
axios.interceptors.response.use((response) => response, (error) => {
  const resp = error.response;

  if (resp.status !== 200 || resp.status !== 201) {
    check = false;
    Notification.error({
      title: 'Error',
      message: resp.data.message,
      dangerouslyUseHTMLString: true,
      customClass: 'global-error-message',
    });
  }
  return Promise.reject(error);
});

if (!window.isDashboard) {
  Vue.config.errorHandler = function (err, vm, info) {
    if (check) {
      Notification.error({
        title: 'Error',
        message: err,
        dangerouslyUseHTMLString: true,
        customClass: 'global-error-message',
      });
    }
    check = true;

    return Promise.reject(err);
  };
}
