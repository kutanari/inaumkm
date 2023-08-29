import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";
import aspectRatio from "@tailwindcss/aspect-ratio";
import tailwindcssAnimated from "tailwindcss-animated";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    darkMode: "class",
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    "ina-red": "hsl(356, 72%, 44%)",
                    "ina-red-darker": "hsl(356, 42.54%, 41.17%)",
                    "ina-orange": "hsl(27, 100%, 83%)",
                    "ina-gray": "hsl(30, 40%, 94%)",
                    "dark-blue": "hsl(233, 26%, 24%)",
                    "lime-green": "hsl(136, 65%, 51%)",
                    "bright-cyan": "hsl(192, 70%, 51%)",
                },
                neutral: {
                    "grayish-blue": "hsl(233, 8%, 62%)",
                    "light-grayish-blue": "hsl(220, 16%, 96%)",
                    "very-light-gray": "hsl(0, 0%, 98%)",
                    white: "hsl(0, 0%, 100%)",
                },
            },
            backgroundImage: (theme) => ({
                "header-desktop": "url('/public/images/bg-intro-desktop.svg')",
                "header-mobile": "url('/public/images/bg-intro-mobile.svg')",
                "image-mockups": "url('/public/images/image-mockups.png')",
                "about-hero": "url('/public/images/team.jpg')",
                "contact": "url('/public/images/contact.jpg')",
            }),
            backgroundSize: {
                "custom-mobile-header-size": "100% 50%",
                "custom-mobile-mockup-size": "auto 60%",
            },
            container: {
                center: true,
                padding: {
                    DEFAULT: "1.25rem",
                    sm: "2rem",
                    lg: "3rem",
                    xl: "4rem",
                    "2xl": "5rem",
                },
            },
            inset: {
                "-42.6%": "-42.6%",
            },
        },
    },

    plugins: [forms, typography, aspectRatio, tailwindcssAnimated],
};
