import { defineConfig } from "vite";
import { viteStaticCopy } from "vite-plugin-static-copy";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        viteStaticCopy({
            targets: [
                {
                    src: "resources/assets/img", // Sumber gambar
                    dest: "", // Folder tujuan di build
                },
            ],
        }),
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
