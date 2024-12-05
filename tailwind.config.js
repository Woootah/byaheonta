const { transform } = require('sucrase');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js,php}",
    "./public/**/*.{html,js,php}"
],
  theme: {
    extend: {
        animation: {
            "loop-scroll": "loop-scroll 30s linear infinite"
        },
        keyframes: {
            "loop-scroll" : {
                from: {transform: "translateX(0)"},
                to: {transform: "translateX(-50%)"}
            },
        },
        fontFamily: {
            "font1" : "DM Serif Display",
            "font2" : "DM Sans",
        },
        colors: {
            "sdgreen": "#1C2628",
            "dgreen" : "#103713",
            "lgreen" : "#628B35",
            "vlgreen" : "#c1f588",
            "cwhite" : "#FFFDF5",
            "cblack" : "#070707",
        }
    },
  },
  plugins: [],
}
