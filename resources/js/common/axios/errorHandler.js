// eslint-disable-next-line no-undef
axios.interceptors.response.use((response) => response, (error) => {
  const resp = error.response;

  if (resp.status !== 200 || resp.status !== 201) {
    $.toast({
      heading: 'Error',
      hideAfter: 2000,
      text: resp.data.message,
      position: 'top-right',
      stack: false,
      loader: false,
      icon: 'error',
      allowToastClose: false,
    });
  }
  return Promise.reject(error);
});
