<?php

$route[]=['/','HomeController@index'];
$route[]=['/posts','PostController@index'];
$route[]=['/post/{id}/show','PostController@show'];


return $route;