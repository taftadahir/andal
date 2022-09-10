const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
                montserrat: ["Montserrat", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: "#edf1fb",
                    100: "#c6d4f4",
                    200: "#abc0ee",
                    300: "#84a3e7",
                    400: "#6d91e2",
                    500: "#4875db",
                    600: "#426ac7",
                    700: "#33539b",
                    800: "#284078",
                    900: "#1e315c",
                },
                secondary: {
                    50: "#fef3e9",
                    100: "#fdd8ba",
                    200: "#fcc699",
                    300: "#faab6b",
                    400: "#f99b4e",
                    500: "#f88222",
                    600: "#e2761f",
                    700: "#b05c18",
                    800: "#884813",
                    900: "#68370e",
                },
                black: {
                    50: "#eaeaeb",
                    100: "#bdbfc0",
                    200: "#9d9fa2",
                    300: "#717478",
                    400: "#55595d",
                    500: "#2b2f35",
                    600: "#272b30",
                    700: "#1f2126",
                    800: "#181a1d",
                    900: "#121416",
                },
                white: {
                    50: "#f9f9f9",
                    100: "#ebebeb",
                    200: "#e2e2e2",
                    300: "#d4d4d4",
                    400: "#cccccc",
                    500: "#bfbfbf",
                    600: "#aeaeae",
                    700: "#888888",
                    800: "#696969",
                    900: "#505050",
                },
                success: {
                    50: "#e6f4f1",
                    100: "#b0ddd3",
                    200: "#8accbd",
                    300: "#54b59f",
                    400: "#33a78d",
                    500: "#009170",
                    600: "#008466",
                    700: "#006750",
                    800: "#00503e",
                    900: "#003d2f",
                },
                error: {
                    50: "#fdebeb",
                    100: "#f8c2c1",
                    200: "#f4a4a3",
                    300: "#f07a7a",
                    400: "#ed6160",
                    500: "#e83938",
                    600: "#d33433",
                    700: "#a52828",
                    800: "#801f1f",
                    900: "#611818",
                },
                warning: {
                    50: "#fff9ec",
                    100: "#ffecc4",
                    200: "#ffe2a8",
                    300: "#ffd580",
                    400: "#ffcd68",
                    500: "#ffc142",
                    600: "#e8b03c",
                    700: "#b5892f",
                    800: "#8c6a24",
                    900: "#6b511c",
                },
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
