// resources/js/core/bootstrap.js

import _ from 'lodash';
window._ = _;

import $ from 'jquery';
window.$ = $;
window.jQuery = $;

try {
  import('popper.js').then(({ default: Popper }) => {
    window.Popper = Popper;
  });

  import('bootstrap').then((bootstrap) => {
    window.bootstrap = bootstrap;
  });
} catch (e) {
  console.error('Error loading popper/bootstrap:', e);
}

// axios можно импортировать в другом месте, но если хочешь здесь:
import axios from 'axios';
window.axios = axios;

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Если используешь Echo и Pusher, можно так:
// import Echo from 'laravel-echo';
// import Pusher from 'pusher-js';
//
// window.Pusher = Pusher;
//
// window.Echo = new Echo({
//   broadcaster: 'pusher',
//   key: import.meta.env.VITE_PUSHER_APP_KEY,
//   cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
//   forceTLS: true,
// });
