import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import preset from "./vendor/filament/support/tailwind.config.preset";
import fs from "fs";
import path from "path";

const themeFilePath = path.resolve(__dirname, "theme.json");
const activeTheme = fs.existsSync(themeFilePath) ? JSON.parse(fs.readFileSync(themeFilePath, "utf8")).name : "anchor";

/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],
    content: [
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/views/components/**/*.blade.php",
        "./resources/views/components/blade.php",
        "./wave/resources/views/**/*.blade.php",
        "./resources/themes/" + activeTheme + "/**/*.blade.php",
        "./resources/plugins/**/*.php",
        "./config/*.php",
    ],

    theme: {
        extend: {
            animation: {
                marquee: "marquee 25s linear infinite",
                zoom: "zoom 10s ease-in-out forwards",
            },
            keyframes: {
                marquee: {
                    from: { transform: "translateX(0)" },
                    to: { transform: "translateX(-100%)" },
                },
                zoom: {
                    "0%": { transform: "scale(1)" },
                    "100%": { transform: "scale(1.2)" },
                },
            },
            colors: {
            earth: "#B86B4B",     // rötlich-kupferne Erde, bleibt
            sunflower: "#E0C642", // satteres, warmes Gelb
            olive: "#7F9B5C",     // leicht mehr Lebendigkeit für Frische
            stone: "#A3A3A3",     // etwas neutraler, damit die Gelbtöne wirken
            sand: "#E5D4B8",      // minimal wärmer, harmoniert mit Gelb
            wood: "#5B3620",      // dunkles Holz bleibt, minimal abgedunkelt für mehr Kontrast
        }
        },
    },

    plugins: [forms, require("@tailwindcss/typography")],
};
