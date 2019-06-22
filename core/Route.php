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
        // print_r($urlArray);

        foreach($this->routes as $route){
            $routeArray=explode('/',$route[0]);
            print_r($routeArray);
            echo '<br/>';
            for($i=0;$i < count($routeArray); $i++){
                if(strpos($routeArray[$i],"{") !== false && (count($urlArray)== \count($routeArray))){
                    $routeArray[$i]=$urlArray[$i];
                    
                }
                $route[0]=\implode($routeArray,'/');
            }
            if($url == $route[0]){
                echo '<br/>Rota valída';
                break;
            }else{
                echo '<br/>Rota invalida';
            }
        }
    }
}