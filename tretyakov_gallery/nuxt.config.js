export default {
  // Target: https://go.nuxtjs.dev/config-target
  target: 'static',

  // admin - доступ к админ панеле
  // user - пользователь
  publicRuntimeConfig: {
    role: 'admin',
  },

  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'tretyakov_gallery',
    htmlAttrs: {
      lang: 'en'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  // Url пути
  router: {
    base: '/',
    routes: [
      {
        name: 'picture-id',
        path: '/picture/:id?',
        component: 'pages/picture/_id.vue',
      },
      {
        name: 'admin',
        path: '/admin',
        component: 'pages/admin/index.vue',
      },
      {
        name: 'picture-edit-id',
        path: '/picture/edit/:id?',
        component: 'pages/picture/edit/_id.vue',
      },
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/bootstrap
    'bootstrap-vue/nuxt',
    '@nuxtjs/axios',
    '@nuxtjs/proxy',
  ],

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
  },

  server: {
    port: 3000,
    host: '0.0.0.0',
  },


  // Путь к бэку
  axios: {
    baseURL: 'http://localhost:8000/',
  },
}
