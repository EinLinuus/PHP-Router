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

/**
 * Page "/profile/"
 */
require_once __DIR__ . '/page-profile.php';

/**
 * Page "/login/"
 */
require_once __DIR__ . '/page-login.php';

/**
 * Page "/ajax/"
 */
require_once __DIR__ . '/page-ajax.php';

/**
 * Page "/ajax/demo/"
 */
require_once __DIR__ . '/page-ajax-demo.php';


/* --- Register pages above --- */

/**
 * Start router
 */
$router->execute();