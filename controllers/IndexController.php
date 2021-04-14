<?php

namespace swagger\controllers;

use backend\classes\AuthedController;
use backend\classes\PageMetaData;
use wulaphp\mvc\view\SmartyView;
use function OpenApi\scan;

/**
 * Class IndexController
 * @acl     r:swagger
 * @package swagger\controllers
 */
class IndexController extends AuthedController {
    /**
     * @return \wulaphp\mvc\view\SmartyView
     */
    public function index(): SmartyView {
        $data = PageMetaData::meta();

        return view('index', $data);
    }

    public function api($ver = 'v1'): array {
        $api  = scan(MODULES_PATH);
        $data = $api->toJson();

        return json_decode($data, true);
    }
}