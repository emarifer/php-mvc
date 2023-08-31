/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/index.php", "./resources/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        primary: "#0f172a",
      },
      fontFamily: {
        Kanit: ["Kanit, sans-serif"],
      },
    },
  },
  plugins: [],
}

