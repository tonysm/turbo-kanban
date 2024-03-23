const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            animation: {
                'appear-then-fade-out': 'appear-then-fade-out 3s both',
            },

            keyframes: () => ({
                ['appear-then-fade-out']: {
                    '0%, 100%': { opacity: 0 },
                    '10%, 80%': { opacity: 1 },
                },
            }),
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/typography'),
    ]
}
