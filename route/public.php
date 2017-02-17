<?php
/**
 * Created by PhpStorm.
 * User: 김종갑
 * Date: 2017-02-17
 * Time: 오전 9:57
 */


//public route
$app->group('', function(){

    $this->get('/', function ($request, $response, $args) {
        return $this->view->render($response, 'index.php', ['type'=>'main']);
    });

    $this->get('/contact', function ($request, $response, $args) {
        var_dump($args);
        return $this->view->render($response, 'contact/contact.php');
    });

    $this->get('/notice', function ($request, $response, $args) {
        return $this->view->render($response, 'notice/list_page.php');
    });

    $this->get('/notice/{idx}', function ($request, $response, $args) {
        return $this->view->render($response, 'notice/view_page.php');

    });

    $this->group('/user', function(){

        $this->get('', function ($request, $response, $args) {
            return $this->view->render($response, 'profile.php', [
                'name' => $args['name']
            ]);
        });

        $this->get('/login', function ($request, $response, $args) {
            return $this->view->render($response, 'profile.php', [
                'name' => $args['name']
            ]);
        });

        $this->post('/user', function ($request, $response) {
            $body = $request->getBody()->getContents();
            var_dump($body);
            return $response;
        });

    });

    $this->post('/upload', function ($request, $response) {
        $files = $request->getUploadedFiles();
        if (empty($files['newfile'])) {
            throw new Exception('Expected a newfile');
        }

        $newfile = $files['newfile'];
        // do something with $newfile

        if ($newfile->getError() === UPLOAD_ERR_OK) {
            $uploadFileName = $newfile->getClientFilename();
            $newfile->moveTo($_SERVER['DOCUMENT_ROOT'].'/uploads/' . date('Y') . '/' . $uploadFileName);
        }

    });

});