import defaultTheme from 'tailwindcss/defaultTheme'
import forms from '@tailwindcss/forms'

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // ✅ Aktifkan dark mode manual via class

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js', // ✅ Tambahkan untuk file JS (jika ada toggle)
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    light: '#4f46e5',  // Indigo
                    DEFAULT: '#4338ca',
                    dark: '#3730a3',
                },
                background: {
                    light: '#f9fafb',
                    dark: '#111827',
                },
            },
        },
    },

    plugins: [forms],
}
