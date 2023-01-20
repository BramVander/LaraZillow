/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],
    theme: {
        extend: {
            // colors: ({ colors }) => ({
            //     bram: "#f90a0a",
            // class: bg-bram
            // }),
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
