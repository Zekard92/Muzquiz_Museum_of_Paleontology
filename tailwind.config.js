/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ["./resources/**/*.{php,js}"],
	mode: 'jit',
	plugins: [],
	safelist: [
		'bg-slate-300',
	],
	theme: {
		extend: {
			colors: {
				background: {
					DEFAULT:'#098094',
				},
				primary: {
					DEFAULT: '#A9A9A9',
				},
				secondary: {
					light: '#D2B48C',
					DEFAULT: '#CD5C5C',
				},
				accent: {
					DEFAULT: '#FFA500',
					variant: '#CD5C5C',
				},
			},
		},
	},
}
