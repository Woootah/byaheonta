/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js,php}",
    "./public/**/*.{html,js,php}"
],
  theme: {
    extend: {
        fontFamily: {
            "font1" : "DM Serif Display",
            "font2" : "DM Sans",
        },
        colors: {
            "sdgreen": "#1C2628",
            "dgreen" : "#103713",
            "lgreen" : "#628B35",
            "cwhite" : "#FFFDF5",
        }
    },
  },
  plugins: [],
}
