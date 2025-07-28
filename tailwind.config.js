import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            colors: {
                primary: "#4361ee",
                secondary: "#3f37c9",
                accent: "#4895ef",
                dark: "#1b263b",
                light: "#f8f9fa",
            },
            fontFamily: {
                sans: ["Segoe UI", "Tahoma", "Geneva", "Verdana", "sans-serif"],
            },
            animation: {
                "fade-in-up": "fadeInUp 0.6s ease-out forwards",
                float: "float 3s ease-in-out infinite",
                "pulse-glow": "pulseGlow 2s ease-in-out infinite alternate",

                "slide-in": "slideIn 0.6s ease-out",
                "pulse-glow": "pulseGlow 2s ease-in-out infinite alternate",
            },
            backdropBlur: {
                xs: "2px",
            },
            backgroundColor: {
                glass: "rgba(255, 245, 255, 0.1)",
            },
            keyframes: {
                fadeInUp: {
                    "0%": { opacity: "0", transform: "translateY(20px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" },
                },
                float: {
                    "0%, 100%": { transform: "translateY(0px)" },
                    "50%": { transform: "translateY(-10px)" },
                },
                pulseGlow: {
                    "0%": { boxShadow: "0 0 5px rgba(72, 149, 239, 0.4)" },
                    "100%": { boxShadow: "0 0 20px rgba(72, 149, 239, 0.8)" },
                },
            },
        },
    },

    plugins: [forms],
};
