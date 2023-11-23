import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                "light-mode": "url('/public/assets/imgs/BG.jpg')",
                "dark-mode": "url('/public/assets/imgs/BG_DHVSU_DARKMODE.jpg')",
            },
        },
        variants: {
            extend: {
                backgroundImage: ["dark"],
            },
        },
        plugins: [],
    },
    plugins: [require("tw-elements/dist/plugin.cjs")],
    plugins: [require("flowbite/plugin")],
    plugins: [forms],
};
