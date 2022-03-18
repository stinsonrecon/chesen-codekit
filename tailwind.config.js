module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        green: {
          secondary: '#91cc00',
          secondary_1: '#81bc00',
          primary: '#46b200',
          primary_1: '#0c713d',
        },
        pink: {
          light: '#ff7ce5',
          DEFAULT: '#ff49db',
          dark: '#ff16d1',
        },
        gray: {
          darkest: '#1f2d3d',
          dark: '#3c4858',
          DEFAULT: '#c0ccda',
          light: '#e0e6ed',
          lightest: '#f9fafc',
        }
      },
      fontFamily:{
        lora:['Lora', 'serif'],
        petemoss:['Comforter', 'cursive'],
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}