import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import viteLegacyPlugin from '@vitejs/plugin-legacy';
// import ziggy from 'laravel-vite-plugin-ziggy';

export default defineConfig({
  define: {
    'global': 'window',
  },

  plugins: [
    laravel([
      // JS
      'resources/js/common/main.js',
      'resources/js/app.js',
      'resources/js/dashboard/dashboard-app.js',
      'resources/js/dashboard/dashboard-app-vue.js',
      // 'resources/js/dashboard/article/main.js',
      // 'resources/js/dashboard/user/index.js',
      // 'resources/js/dashboard/article/index.js',

      // Plugins
      'resources/js/plugins/ckeditor.js',
      'resources/js/plugins/moment.min.js',

      // Core
      'resources/js/core/FormRequest.js',
      'resources/js/core/Modal.js',
      'resources/js/core/ConfirmModal.js',
      'resources/js/core/DataTable.js',
      'resources/js/core/MultipleInputs.js',
      'resources/js/core/FileUploader.js',

      // Styles
      'resources/sass/app.scss',
      'resources/sass/dashboard/dashboard-app.scss',
      'resources/sass/dashboard/core/datatable.scss',
    ]),

    //Support old browsers
    viteLegacyPlugin({
      targets: ['defaults', 'not IE 11'],
    }),
    vue({
      reactivityTransform: true,
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
      'vue': 'vue/dist/vue.esm-bundler.js',
      '@': '/resources/js',
      '@core': '/resources/js/core',
      '@plugins': '/resources/js/plugins',
      '@sass': '/resources/sass',
    },
  },

  build: {
    sourcemap: true,
    chunkSizeWarningLimit: 1500,
  },
});
