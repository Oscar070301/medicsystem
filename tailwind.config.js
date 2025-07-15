import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
  extend: {
    colors: {
      terracota: '#e07a5f',
      oliva: '#81b29a',
      dorado: '#f2cc8f',
      fondo: '#fdfaf6',
    },
  },
},
    plugins: [],
};
