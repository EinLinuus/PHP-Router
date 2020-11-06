<?php

/**
 * PHP Router
 * Simple but powerful PHP Router
 * 
 * @author Linus Benkner
 * @version 1.4
 */

/**
 * Base URL
 * The path to your site - if it's in the root directory set it to "/"
 */
$baseurl = '/router/php-router/';
function getBaseURL() { global $baseurl; return $baseurl; }

/**
 * Require the router
 */
require_once __DIR__ . '/router-includes/router.inc.php';

/**
 * Require the routes
 */
require_once __DIR__ . '/router-includes/route.inc.php';

/**
 * Require Router Utilities
 */
require_once __DIR__ . '/router-includes/utils.php';

/**
 * Require Pages
 */
require_once __DIR__ . '/router-pages/init.php';