/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './templates/**/*.twig',   // tes templates
    './assets/**/*.js',        // ton JS si tu utilises des classes Tailwind dedans
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
