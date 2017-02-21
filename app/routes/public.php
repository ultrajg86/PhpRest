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
        $this->logger->addInfo('Info log', ['key'=>'value']);
        $this->logger->addDebug('Debug log');
        $this->logger->addError('Error log');
        return $this->view->render($response, 'index.php', ['type'=>'main']);
    });

    $this->get('/contact', function ($request, $response, $args) {
        return $this->view->render($response, '/contact/contact.php');
    });

    $this->get('/portfolio', function ($request, $response, $args) {
        return $this->view->render($response, '/portfolio/portfolio.php');
    });

    $this->get('/notices', function ($request, $response, $args) {

        $noticeService = $this->get('service')->NoticeService;

        $lists = $noticeService->getLists();

        return $this->view->render($response, '/notice/list_page.php', ['lists'=>$lists]);
    });

    $this->get('/notices/{idx}', function ($request, $response, $args) {
        return $this->view->render($response, '/notice/view_page.php');
    });

    $this->get('/blog', function ($request, $response, $args) {
        return $this->view->render($response, '/blog/view_page.php');
    });

    $this->group('/user', function(){

        $this->get('', function ($request, $response, $args) {
            return $this->view->render($response, 'notice/view_page.php');
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

        require __DIR__ . '/../../libraries/Uploader.php';

        $uploader = new Uploader();
        /*
        $uploader->setThumbnail([
            '_ss' => array('width'=>100, 'height'=>100),
            '_nn' => array('width'=>200, 'height'=>200),
            '_bb' => array('width'=>300, 'height'=>300),
        ]);
        */
        $result = $uploader->run($_FILES['newfile'], true);
        var_dump($result);

        return $response->withRedirect('/');

        /*
        $files = $request->getUploadedFiles();
        if (empty($files['newfile'])) {
            throw new Exception('Expected a newfile');
        }

        $newfile = $files['newfile'];
        // do something with $newfile

        if ($newfile->getError() === UPLOAD_ERR_OK) {
            $uploadFileName = $newfile->getClientFilename();
            $newfile->moveTo(UPLOAD_ROOT .'/uploads/' . date('Y') . '/' . $uploadFileName);
        }
        */

    });

});