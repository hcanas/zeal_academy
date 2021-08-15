const colors = require('tailwindcss/colors');

module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        'nunito': ['Nunito'],
        'montserrat': ['Montserrat'],
        'changa-one': ['Changa One'],
      },
      colors: {
        primary: {
          base: colors.indigo["600"],
          light: colors.indigo["500"],
          dark: colors.indigo["700"],
        },
        secondary: {
          base: colors.trueGray["600"],
          light: colors.trueGray["500"],
          dark: colors.trueGray["700"],
        },
        success: {
          base: colors.green["600"],
          light: colors.green["500"],
          dark: colors.green["700"],
        },
        danger: {
          base: colors.red["600"],
          light: colors.red["500"],
          dark: colors.red["700"],
        },
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
