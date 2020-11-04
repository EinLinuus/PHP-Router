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
     * Route class constructor
     */
    function __construct(string $route) {
        $this->route = trim($route, '/');
        return $this;
    }

    function isCatchAll($is = true){
        $this->catchall = $is;
        return $this;
    }

    function setHandler($function){
        $this->callback = $function;
        return $this;
    }

    function getRoute(){
        return $this->route;
    }

    function getCatchAll(){
        return $this->catchall;
    }

    function getCallback(){
        return $this->callback;
    }

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