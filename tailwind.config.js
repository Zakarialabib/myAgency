const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require('tailwindcss/colors')
module.exports = {
  darkMode: "class",
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Inter", ...defaultTheme.fontFamily.sans],
      },
      colors: {
        dark: {
          bg: "#151823",
          "eval-1": "#222738",
          "eval-2": "#2A2F42",
          "eval-3": "#2C3142",
        },
        indigo: colors.indigo,
        rose: colors.rose,
        slate: colors.slate,
        sky: colors.sky,
        orange: colors.orange,
        red: colors.red
      },
    }
  },
  plugins: [],
}
