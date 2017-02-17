<?php
/**
 * Created by PhpStorm.
 * User: 김종갑
 * Date: 2017-02-14
 * Time: 오전 10:45
 */

//middleware

// routes...
$app->add(function ($request, $response, callable $next) {

    //$response->getBody()->write('start');
    $route = $request->getAttribute('route');

    // return NotFound for non existent route
    if (empty($route)) {
        throw new NotFoundException($request, $response);
    }

    $name = $route->getName();
    $groups = $route->getGroups();
    $methods = $route->getMethods();
    $arguments = $route->getArguments();

    //var_dump($name, $groups, $methods, $arguments);
    $args = array('name'=>$name, 'groups'=>$groups, 'methods'=>$methods, 'arguments'=>$arguments);

    // do something with that information
    $response = $next($request, $response, $args);  //run

    //$response->getBody()->write('end');
    return $response;
});