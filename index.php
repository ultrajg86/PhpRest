<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

$container = $app->getContainer();

//Register component on container
$container['view'] = function($container){
    $view = new \Slim\Views\Twig('pages', ['cache'=>'cache']);
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($container['router'], $basePath));
    return $view;
};

//middleware
$app->add(function($request, $response, $next){
    $response->getBody()->write('BEFORE');
    $response = $next($request, $response);
    $response->getBody()->write('AFTER');
   return $response;
});

//Route
$app->get('/', function (Request $request, $response, $args) {
    return $this->view->render($response, 'profile.php', [
        'name' => $args['name']
    ]);
});

$app->post('/', function (Request $request, Response $response) {
    $body = $request->getBody()->getContents();
    var_dump($body);
    return $response;
});

$app->group('/api', function(){

   $this->get('/', function (Request $request, Response $response){
       var_dump($request->getAttributes(), $response->getBody());
       return $response;
   });

});

$app->get('/hello/[{name}]', function (Request $request, Response $response, $args) {
    var_dump($args);
    $name = $request->getAttribute('name');
    if(empty($name)){
        $name = 'World';
    }
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->run();

?>