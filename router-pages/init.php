<?php

/**
 * Initialization
 * 
 * All pages should be registered here
 */

/**
 * Create Router
 */
$router = new Router();

/* --- Register pages below --- */


/**
 * Page "/"
 */
require_once __DIR__ . '/page-home.php';


/* --- Register pages above --- */

/**
 * Start router
 */
$router->execute();