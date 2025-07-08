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
                // sans: ["Inter", "ui-sans-serif", "system-ui"],
            },
            colors: {
                primary: {
                    50: "#eff6ff",
                    100: "#dbeafe",
                    200: "#bfdbfe",
                    300: "#93c5fd",
                    400: "#60a5fa",
                    500: "#3b82f6",
                    600: "#2563eb",
                    700: "#1d4ed8",
                    800: "#1e40af",
                    900: "#1e3a8a",
                },
            },
            animation: {
                "fade-in-up": "fadeInUp 0.8s ease-out forwards",
                "fade-in-up-delay": "fadeInUp 0.8s ease-out 0.2s forwards",
                "float-hover": "floatHover 0.6s ease-in-out",
                "hover-float": "hoverFloat 1.5s ease-in-out infinite",
                "pulse-slow": "pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite",
                "slide-in-left": "slideInLeft 0.6s ease-out forwards",
                "slide-in-right": "slideInRight 0.6s ease-out forwards",
                "scale-in": "scaleIn 0.5s ease-out forwards",
                "bounce-in": "bounceIn 0.6s ease-out forwards",
                "zoom-in": "zoomIn 0.5s ease-out forwards",
                "rotate-in": "rotateIn 0.6s ease-out forwards",
            },
            keyframes: {
                fadeInUp: {
                    "0%": {
                        opacity: "0",
                        transform: "translateY(30px)",
                    },
                    "100%": {
                        opacity: "1",
                        transform: "translateY(0)",
                    },
                },
                floatHover: {
                    "0%": { transform: "translateY(0)" },
                    "50%": { transform: "translateY(-6px)" },
                    "100%": { transform: "translateY(0)" },
                },
                hoverFloat: {
                    "0%, 100%": { transform: "translateY(0px)" },
                    "50%": { transform: "translateY(-6px)" },
                },
                slideInLeft: {
                    "0%": {
                        opacity: "0",
                        transform: "translateX(-50px)",
                    },
                    "100%": {
                        opacity: "1",
                        transform: "translateX(0)",
                    },
                },
                slideInRight: {
                    "0%": {
                        opacity: "0",
                        transform: "translateX(50px)",
                    },
                    "100%": {
                        opacity: "1",
                        transform: "translateX(0)",
                    },
                },
                scaleIn: {
                    "0%": {
                        opacity: "0",
                        transform: "scale(0.9)",
                    },
                    "100%": {
                        opacity: "1",
                        transform: "scale(1)",
                    },
                },
                bounceIn: {
                    "0%": {
                        opacity: "0",
                        transform: "scale(0.3)",
                    },
                    "50%": {
                        opacity: "1",
                        transform: "scale(1.05)",
                    },
                    "70%": {
                        transform: "scale(0.9)",
                    },
                    "100%": {
                        opacity: "1",
                        transform: "scale(1)",
                    },
                },
                zoomIn: {
                    "0%": {
                        opacity: "0",
                        transform: "scale(0.5)",
                    },
                    "100%": {
                        opacity: "1",
                        transform: "scale(1)",
                    },
                },
                rotateIn: {
                    "0%": {
                        opacity: "0",
                        transform: "rotate(-200deg)",
                    },
                    "100%": {
                        opacity: "1",
                        transform: "rotate(0)",
                    },
                },
            },
        },
    },

    darkMode: "class",
    plugins: [forms, typography],
};
