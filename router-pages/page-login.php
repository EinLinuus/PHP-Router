<?php

/**
 * Router Page
 * Route: "/login/"
 * 
 * @author Linus Benkner
 */

$router->registerRoute(
    (new Route('/login/'))->setMethod('GET')->setHandler('page_login_get')
);

function page_login_get( $route, $data ){

    echo <<< HTML

    <form method="post">
        <input type="text" name="firstname" placeholder="First name" required>
        <input type="text" name="lastname" placeholder="Last name" required>
        <input type="submit" value="Submit">
    </form>

    HTML;

}

/**
 * POST
 */
$router->registerRoute(
    (new Route('/login/'))->setMethod('POST')->setHandler('page_login_post')
);

function page_login_post( $route, $data ){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    echo <<< HTML

        <p>
            You entered $firstname and $lastname
        </p>

    HTML;

}