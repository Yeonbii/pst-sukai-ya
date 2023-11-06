/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    container: {
      center: true,
      padding: '16px',
    },
    extend: {
      colors: {
        dark: '#001F4F',
        primary: '#DC7418',
        secondary: '#043277',
        light: '#EEEEEE',
      },
      screens: {
        '2xl': '1320px',
      }
    },
  },
  plugins: [],
}

