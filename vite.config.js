// Importe la fonction `defineConfig` depuis le module 'vite'.
import { defineConfig } from "vite";
// Importe le plugin 'laravel-vite-plugin' qui permet d'intégrer Vite avec Laravel.
import laravel from "laravel-vite-plugin";

// Exporte la configuration par défaut pour Vite.
export default defineConfig({
    // Définit les plugins à utiliser dans la configuration de Vite.
    plugins: [
        // Utilise le plugin Laravel pour Vite.
        laravel({
            // Définit les fichiers d'entrée pour le processus de construction.
            // Ces fichiers sont les points de départ que Vite utilisera pour construire le bundle.
            input: ["resources/css/app.css", "resources/js/app.js"],
            // Active le rechargement automatique de la page lorsque ces fichiers sont modifiés.
            refresh: true,
        }),
    ],
});
