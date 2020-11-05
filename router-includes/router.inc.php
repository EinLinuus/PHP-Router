<?php

/**
 * PHP Router
 * Router class
 * 
 * @author Linus Benkner
 */

class Router {

    /**
     * Routes
     */
    private $routes = array();

    /**
     * Router class constructor
     * @since 1.0
     */
    function __construct(){

    }

    /**
     * Add Route to router
     * @since 1.0
     */
    function registerRoute(Route $route){
        array_push($this->routes, $route);
    }

    /**
     * Get all registered routes
     * @since 1.0
     */
    function getRoutes(){
        return $this->routes;
    }

    /**
     * Execute
     * @since 1.0
     */
    function execute(){

        $url = $_SERVER['REQUEST_URI']; // Get requested URL
        $url = explode('?', $url)[0]; // Remove GET Parameters
        $url = explode('#', $url)[0]; // Remove Hash
        $url = substr($url, strlen(getBaseURL())); // Remove Absolute path
        $url = trim($url, '/'); // Remove slashes

        $nearestRoute = null;
        $nearestCount = 0;

        $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);

        foreach($this->getRoutes() as $route){

            $routeURL = $route->getRoute();
            $routeCatchAll = $route->getCatchAll();
            $routeMethod = strtolower($route->getMethod());

            if($routeMethod === "*" || $routeMethod === $requestMethod){

                $charCount = getSameCharAmount($routeURL, $url);

                if($charCount === strlen($routeURL)){
                    if($charCount < strlen($url)){
                        // Route is parent
                        if($routeCatchAll){
                            if($nearestCount <= $charCount){
                                // Replace because its more specific
                                $nearestCount = $charCount;
                                $nearestRoute = $route;
                            }else {
                                // Other is more specific
                            }
                        }else { 
                            // Invalid because route is no catchall
                        }
                    }else {
                        // Exact page request
                        $nearestRoute = $route;
                        $nearestCount = $charCount;
                    }
                }else {
                    // Other page
                }

            }

        }

        if($nearestRoute === null){
            /**
             * * 404 Error
             */
            echo "404 File not found.";
        }else {
            /**
             * Parse data
             */
            $data = array(
                'exact' => (strlen($url) === $nearestCount),
                'path' => (removeFirstChars($url, $nearestRoute->getRoute())),
            );
            /**
             * Call function callback
             */
            $nearestRoute->callCallback($data);
        }

    }

}