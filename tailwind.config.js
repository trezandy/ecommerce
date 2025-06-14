const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php"
  ],

  theme: {
    extend: {
      container: {
        center: true,
        padding: "1rem"
      },
      fontFamily: {
        sans: ["Inter", ...defaultTheme.fontFamily.sans]
      },
      gridTemplateRows: {
        "[auto,auto,1fr]": "auto auto 1fr"
      }
    }
  },

  plugins: [require("@tailwindcss/forms")]
};
