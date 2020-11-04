<?php

/**
 * Router Page
 * Route: "/profile/*"
 * 
 * @author Linus Benkner
 */

$router->registerRoute(
    (new Route('/profile/'))->isCatchAll()->setHandler('page_profile')
);

function page_profile( $route, $data ){

    // Get requested path
    $path = $data['path'];

    // Remove "/" at start and end
    $path = trim($path, "/");

    echo <<< HTML

    <center>
        
        <h1>Path /profile/</h1>
        
        <hr>

        <p>You are on the Profile-Page!</p>

        <p>You are visiting the profile of $path.</p>

    </center>

    HTML;

}