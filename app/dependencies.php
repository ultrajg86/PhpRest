<?php
/**
 * Created by PhpStorm.
 * User: 김종갑
 * Date: 2017-02-14
 * Time: 오후 3:59
 */

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
    $view = new \Slim\Views\Twig('pages', [
        'debug' => true,
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
//    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
//    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));
    $view->addExtension(new Twig_Extension_Debug());

    //hm.....
    $view->getEnvironment()->addGlobal('base_url', _HOST_);

    return $view;
};

//logging
$container['logger'] = function($container){
  $logger = new \Monolog\Logger('LOG');
  $file_handler = new \Monolog\Handler\StreamHandler('../logs/' . date('Y-m-d') . '.log');
  $logger->pushHandler($file_handler);
  return $logger;
};


//service layer
//so..so...
$container['service'] = function($container){
    require SERVICE_PATH . '/Services.php';

    $db = $container->get('db');
    $logger = $container->get('logger');

    return new \App\Service\Service($logger);
};