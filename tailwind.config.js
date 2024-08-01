/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.{php,js}",
  ],
  theme: {
    extend: {
      colors: {
        negro: {
            50: '#f6f6f6',
            100: '#e7e7e7',
            200: '#d1d1d1',
            300: '#b0b0b0',
            400: '#888888',
            500: '#6d6d6d',
            600: '#5d5d5d',
            700: '#4f4f4f',
            800: '#454545',
            900: '#3d3d3d',
            950: '#000000',
        },
        corn: {
            50: '#ffffe7',
            100: '#ffffc1',
            200: '#fffc86',
            300: '#fff241',
            400: '#ffe10e',
            500: '#e5be01',
            600: '#d09b00',
            700: '#a66f02',
            800: '#89560a',
            900: '#74460f',
            950: '#442504',
        },
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}