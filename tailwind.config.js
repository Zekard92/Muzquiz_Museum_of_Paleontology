/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ["./resources/**/*.{php,js}"],
	mode: 'jit',
	plugins: [],
	safelist: [
		'bg-slate-300',
	],
	theme: {
		extend: {},
	},
}
