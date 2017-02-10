<?php

/*
 * template url : https://bootstrapmade.com/demo/Moderna/
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        // Only set this if you need access to route within middleware
        'determineRouteBeforeAppMiddleware' => true,
        'displayErrorDetails' => true,
        'db'=>[
            'driver' => 'mysqli',
            'host' => 'localhost',
            'database' => 'database',
            'username' => 'user',
            'password' => 'password',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => ''
        ]
    ]
]);

// Get container
$container = $app->getContainer();

// Service factory for the ORM
$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

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

// routes...
$app->add(function (Request $request, Response $response, callable $next) {
    $route = $request->getAttribute('route');

    // return NotFound for non existent route
    if (empty($route)) {
        throw new NotFoundException($request, $response);
    }

    $name = $route->getName();
    $groups = $route->getGroups();
    $methods = $route->getMethods();
    $arguments = $route->getArguments();

    // do something with that information
    return $next($request, $response);
});

//public route
$app->group('', function(){

    $this->get('/', function (Request $request, $response, $args) {
        return $this->view->render($response, 'profile.php');

    });

    $this->group('/user', function(){

        $this->get('', function (Request $request, $response, $args) {
            return $this->view->render($response, 'profile.php', [
                'name' => $args['name']
            ]);
        });

        $this->get('/login', function (Request $request, $response, $args) {
            return $this->view->render($response, 'profile.php', [
                'name' => $args['name']
            ]);
        });
    });


    $this->post('/user', function (Request $request, Response $response) {
        $body = $request->getBody()->getContents();
        var_dump($body);
        return $response;
    });

});

//admin route
$app->group('/admin', function(){

    $this->get('/', function (Request $request, Response $response){
        $data = array('name' => 'Rob', 'age' => 40);
        $newResponse = $response->withJson($data, 200);
        return $newResponse;
    });

});


//api route
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