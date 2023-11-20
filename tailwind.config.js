import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
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

    plugins: [forms, typography, require("flowbite/plugin")],
};
