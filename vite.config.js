import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import react from '@vitejs/plugin-react';
import vue from '@vitejs/plugin-vue';
import viteLegacyPlugin from '@vitejs/plugin-legacy';
// import ziggy from 'laravel-vite-plugin-ziggy';

export default defineConfig({
  define: {
    'global': 'window',
  },

  plugins: [
    laravel([
      // JS plugins
      'resources/js/plugins/ckeditor.js',
      'resources/js/plugins/moment.min.js',

      // Core JS utilities
      'resources/js/core/ConfirmModal.js',
      'resources/js/core/DataTable.js',
      'resources/js/core/FormRequest.js',
      'resources/js/core/Modal.js',
      'resources/js/core/MultipleInputs.js',
      'resources/js/core/FileUploader.js',

      // Main app and dashboard
      'resources/js/common/main.js',
      'resources/js/app.js',
      'resources/js/dashboard/dashboard-app.js',
      'resources/js/dashboard/dashboard-app-vue.js',
      'resources/js/dashboard/profile/main.js',

      // SCSS
      'resources/sass/app.scss',
      'resources/sass/dashboard/dashboard-app.scss',
      'resources/sass/dashboard/core/datatable.scss',
    ]),
    viteLegacyPlugin({
      targets: ['defaults', 'not IE 11'], // Update legacy targets here
    }),

    // react(), // Uncomment if using React
    // ziggy(), // Uncomment if using Ziggy
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
  ],

  resolve: {
    alias: {
      '@': '/resources/js',
      '@core': '/resources/js/core',
      '@plugins': '/resources/js/plugins',
      '@sass': '/resources/sass',
    },
  },

  build: {
    sourcemap: true,
  },
});
