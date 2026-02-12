/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js'
  ],
  theme: {
    extend: {
      colors: {
        emerald: {
          50: '#ecf6f2',
          100: '#d6ebe3',
          200: '#b1d7c9',
          300: '#7fbca7',
          400: '#4b9b7f',
          500: '#2c7a62',
          600: '#215f4c',
          700: '#1b4a3c',
          800: '#13372c',
          900: '#0e241d'
        },
        midnight: {
          50: '#e9edf2',
          100: '#cfd8e2',
          200: '#a4b4c6',
          300: '#748da7',
          400: '#4c6c8f',
          500: '#35557a',
          600: '#294561',
          700: '#22394e',
          800: '#182938',
          900: '#0b1c2c'
        },
        gold: {
          50: '#fbf7ef',
          100: '#f4eddc',
          200: '#e8d9b5',
          300: '#dbc089',
          400: '#c9a86a',
          500: '#b18f4e',
          600: '#8e703d',
          700: '#6d5530',
          800: '#523f25',
          900: '#3b2d1a'
        },
        platinum: '#e5e7eb',
        ivory: '#f8f7f4',
        graphite: '#1c1c1c'
      },
      fontFamily: {
        display: ['"Cormorant Garamond"', 'serif'],
        body: ['"Manrope"', 'sans-serif']
      },
      backgroundImage: {
        'gemstone-glow': 'radial-gradient(circle at top, rgba(201, 168, 106, 0.22), rgba(248, 247, 244, 0.9) 65%, rgba(248, 247, 244, 1) 100%)',
        'subtle-grid': 'radial-gradient(circle at 1px 1px, rgba(28, 28, 28, 0.08) 1px, transparent 0)'
      },
      boxShadow: {
        'lux': '0 25px 60px -30px rgba(11, 28, 44, 0.5)'
      }
    }
  },
  plugins: []
};
