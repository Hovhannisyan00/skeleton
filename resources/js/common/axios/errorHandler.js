import { Notification } from 'element-ui';

// eslint-disable-next-line no-undef
axios.interceptors.response.use((response) => response, (error) => {
  const resp = error.response;

  if (resp.status !== 200 || resp.status !== 201) {
    Notification.error({
      title: 'Error',
      message: resp.data.message,
      dangerouslyUseHTMLString: true,
      customClass: 'global-error-message',
    });
  }
  return Promise.reject(error);
});
