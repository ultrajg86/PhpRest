<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    //$view = new \Slim\Views\Twig('pages', ['cache' => 'cache']);
    $view = new \Slim\Views\Twig('pages');

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

//middleware
/*
$app->add(function($request, $response, $next){
    $response->getBody()->write('BEFORE');
    $response = $next($request, $response);
    $response->getBody()->write('AFTER');
   return $response;
});
*/

//user
$app->group('/', function(){

    $this->get('', function (Request $request, $response, $args) {
        return $this->view->render($response, 'profile.php', [
            'name' => $args['name']
        ]);
    });

    $this->group('/user', function(){

        $this->get('', function(Request $request, Response $response){
            //view login
            echo 'aa';
        });

        $this->post('', function(Request $request, Response $response){
            //view login ok
        });

        $this->get('/join', function(Request $request, Response $response){
            //view login
        });

        $this->post('/join', function(Request $request, Response $response){
            //view login ok
        });

    });

    $this->post('/user', function (Request $request, Response $response) {
        $body = $request->getBody()->getContents();
        var_dump($body);
        return $response;
    });

});

//admin
$app->group('/admin', function(){

    $this->get('/', function (Request $request, Response $response){
        $data = array('name' => 'Rob', 'age' => 40);
        $newResponse = $response->withJson($data, 200);
        return $newResponse;
    });

});


//api
$app->group('/api', function(){

    $this->get('', function (Request $request, Response $response){
        $data = array('name' => 'Rob', 'age' => 40);
        $newResponse = $response->withJson($data, 200);
        return $newResponse;
    });

});

// Render Twig template in route
$app->get('/hello/{name}', function ($request, $response, $args) {
    return $this->view->render($response, 'profile.php', [
        'name' => $args['name']
    ]);
})->setName('profile');

// Run app
$app->run();

?>