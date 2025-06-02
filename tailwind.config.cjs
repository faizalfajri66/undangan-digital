/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
  theme: {
    extend: {
      fontFamily: {
        cursive: ['"Great Vibes"', 'cursive'],
        serif: ['"Playfair Display"', 'serif'],
      },
    },
  },
};
