<?php

namespace Core;

class Route{
    private $routes;
    public function __construct(array $routes){
        $this->setRoutes($routes);
        $this->run();
    }
    private function getURL(){
        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }
    private function setRoutes($routes){

        foreach($routes as $route){
            $explode = explode('@',$route[1]);
            $r = [$route[0],$explode[0],$explode[1]];
            $newRoutes[] = $r;
        }
        $this->routes = $newRoutes;
    }
    private function run(){
        $url= $this->getURL();
        $urlArray=explode('/',$url);

        foreach($this->routes as $route){
            $routeArray=explode('/',$route[0]);
            for($i=0;$i < count($routeArray); $i++){
                if(strpos($routeArray[$i],"{") !== false && (count($urlArray)== \count($routeArray))){
                    $routeArray[$i]=$urlArray[$i];
                    $param[] = $urlArray[$i];
                }
                $route[0]=\implode($routeArray,'/');
            }
            if($url == $route[0]){
                $found = true;
                $controller = $route[1];
                $action = $route[2];
                break;
            }
        }
        if($found){
            echo'foi';
        }
    }
}