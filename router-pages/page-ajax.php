<?php

/**
 * Router Page
 * Route: "/ajax/"
 * 
 * @author Linus Benkner
 */

$router->registerRoute(
    (new Route('/ajax/'))->setHandler('page_ajax_noajax')
);
$router->registerRoute(
    (new Route('/ajax/'))->isAJAX()->setHandler('page_ajax')
);

function page_ajax_noajax( $route, $data ){

    echo <<< HTML

    <center>
        
        <h1>Path /ajax/</h1>
        
        <hr>

        <p>Make an AJAX Request to this page for another result!</p>

    </center>

    HTML;

}

function page_ajax( $route, $data ){

    echo <<< HTML

    Hey there! This content is loaded with AJAX! :D

    HTML;

}