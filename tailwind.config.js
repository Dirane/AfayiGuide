/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#f0f4f8',
          100: '#d9e2ec',
          200: '#bcccdc',
          300: '#9fb3c8',
          400: '#829ab1',
          500: '#627d98',
          600: '#486581',
          700: '#334e68',
          800: '#243b53',
          900: '#102a43',
          DEFAULT: '#0D1F3C',
        },
        accent: {
          50: '#fef7f4',
          100: '#fdeee7',
          200: '#fbdcd0',
          300: '#f8c2b0',
          400: '#f49d84',
          500: '#ef7a5a',
          600: '#e55a3a',
          700: '#d95d39',
          800: '#b94a2f',
          900: '#9a3d2a',
          DEFAULT: '#D95D39',
        },
      },
      fontFamily: {
        sans: ['Inter', 'system-ui', 'sans-serif'],
      },
    },
  },
  plugins: [],
} 