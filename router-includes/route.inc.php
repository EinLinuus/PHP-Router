<?php

/**
 * PHP Router
 * Route class
 * 
 * @author Linus Benkner
 */

class Route {

    /**
     * Route
     */
    private $route = "";
    
    /**
     * Catch-All
     */
    private $catchall = false;

    /**
     * Callback
     */
    private $callback;
    
    /**
     * Method
     */
    private $method = "*";

    /**
     * Route class constructor
     */
    function __construct(string $route) {
        $this->route = trim($route, '/');
        return $this;
    }

    /**
     * Set the method
     * @since 1.0
     */
    function setMethod(string $method){
        $this->method = $method;
        return $this;
    }

    /**
     * Get method
     * @since 1.0
     */
    function getMethod() {
        return $this->method;
    }

    /**
     * Set CatchAll to true/false
     * @since 1.0
     */
    function isCatchAll($is = true){
        $this->catchall = $is;
        return $this;
    }

    /**
     * Set callback function
     * @since 1.0
     */
    function setHandler($function){
        $this->callback = $function;
        return $this;
    }

    /**
     * Get the route as string
     * @since 1.0
     */
    function getRoute(){
        return $this->route;
    }

    /**
     * Check if route is CatchAll
     * @since 1.0
     */
    function getCatchAll(){
        return $this->catchall;
    }

    /**
     * Get the callback function
     * @since 1.0
     */
    function getCallback(){
        return $this->callback;
    }

    /**
     * Call the callback function with specifig arguments
     * @since 1.0
     */
    function callCallback(array $data){
        /**
         * Check if function exists
         */
        if(function_exists($this->getCallback())){
            /**
             * Call callback function with arguments
             */
            call_user_func_array($this->getCallback(), array(
                $this,
                $data
            ));
        }else {
            /**
             * * Error function not found
             */
            echo "404 Function not found.";
        }
    }

}