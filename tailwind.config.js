/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    safelist: [
        'bg-gray-100',
        'bg-purple-100',
        'bg-green-100',
    ],
  theme: {
    extend: {},
  },
  plugins: [],
}
