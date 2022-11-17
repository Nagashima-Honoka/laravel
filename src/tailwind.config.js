/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        minWidth: {
            2: '0.5rem',
            4.5: '1.125rem',
            screen: '100vw'
        },
        minHeight: {
            2: '0.5rem',
            4.5: '1.125rem',
        },
        maxWidth: {
            content: '1080px',
            'content-sm': '960px'
        },
      },
    },
    plugins: [],
  }
