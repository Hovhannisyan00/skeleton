import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import react from '@vitejs/plugin-react';
import vue from '@vitejs/plugin-vue';
// import ziggy from 'laravel-vite-plugin-ziggy';

export default defineConfig({
  define: {
    'global': 'window'
  },

  plugins: [
    laravel([
      'resources/sass/app.scss',
      'resources/js/app.js',
      'resources/js/dashboard/dashboard-app.js'
    ]),
    // react(),
    // ziggy(),
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
  }

});
