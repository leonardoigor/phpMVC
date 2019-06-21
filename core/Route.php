<?php

namespace Core;

class Route{
    private $routes;
    public function __construct(array $routes){
        $this->routes=$routes;
        $this->run();
    }
    private function getURL(){
        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }
    private function run(){
        $url= $this->getURL();
        $urlArray=explode('/',$url);
        print_r($urlArray);

        foreach($this->routes as $route){
            $routeArray=explode('/',$route[])
        }
    }
}