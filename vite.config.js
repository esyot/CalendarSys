import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import path from "path"; // Add this to resolve paths

export default defineConfig({
    plugins: [vue()],
    resolve: {
        alias: {
            "@": path.resolve(__dirname, "resources/js"), // Define the alias here
        },
    },
});
