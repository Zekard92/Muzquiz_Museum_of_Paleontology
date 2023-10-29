/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ["./resources/**/*.{php,js}"],
	mode: 'jit',
	plugins: [],
	purge:["./resources/**/*.{php,js}"],
	theme: {
		extend: {},
	},
}
