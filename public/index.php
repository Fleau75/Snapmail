<?php

// Importation de la classe Request du framework Laravel.
// Cette classe encapsule les informations de la requête HTTP entrante.
use Illuminate\Http\Request;

// Définition d'une constante pour marquer le début de l'exécution de Laravel.
// Cela peut être utile pour mesurer le temps de démarrage et d'exécution de l'application.
define('LARAVEL_START', microtime(true));

// Vérification si l'application est en mode maintenance.
// Si un fichier de maintenance spécifique existe, cela signifie que l'application
// a été mise en mode maintenance, probablement par la commande Artisan `down`.
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    // Si le fichier existe, exécutez-le. Ce fichier peut effectuer des opérations comme
    // afficher un message de maintenance ou effectuer une redirection.
    require $maintenance;
}

// Enregistrement de l'autoloader de Composer.
// L'autoloader est crucial car il permet de charger automatiquement toutes les classes
// nécessaires sans avoir besoin de `require` manuels.
require __DIR__.'/../vendor/autoload.php';

// Amorçage de l'application Laravel et gestion de la requête HTTP.
// Le fichier `bootstrap/app.php` initialise et configure l'application,
// retourne une instance de l'application Laravel.
(require_once __DIR__.'/../bootstrap/app.php')
    // Capture de la requête HTTP actuelle à travers la méthode `capture` de la classe `Request`.
    // Cette méthode crée une instance de Request en utilisant les superglobales PHP comme $_GET, $_POST, etc.
    ->handleRequest(Request::capture());
