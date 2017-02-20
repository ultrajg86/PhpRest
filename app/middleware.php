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

//    $name = $route->getName();
//    $groups = $route->getGroups();
//    $methods = $route->getMethods();
//    $arguments = $route->getArguments();
//    $uri = $request->getUri();//this works

    //var_dump($name, $groups, $methods, $arguments);
    //$args = array('name'=>$name, 'groups'=>$groups, 'methods'=>$methods, 'arguments'=>$arguments);

    $view = $this->get('view');
    $path = $request->getUri()->getPath();//this works
    $view->getEnvironment()->addGlobal('currentPath', $path);

    //$view->getEnvironment()->addGlobal('view', $args);

    // do something with that information
    $response = $next($request, $response);  //run

    //$response->getBody()->write('end');
    return $response;
});