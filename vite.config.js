import { defineConfig } from "vite";
import { viteStaticCopy } from "vite-plugin-static-copy";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
