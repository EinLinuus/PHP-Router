<?php

/**
 * Router Page
 * Route: "/"
 * 
 * @author Linus Benkner
 */

$router->registerRoute(
    (new Route('/'))->setHandler('page_home')
);

function page_home( $route, $data ){

    echo <<< HTML

    <center>
        
        <h1>Path /</h1>
        
        <hr>

        <p>You are on the Home-Page!</p>

    </center>

    HTML;

}