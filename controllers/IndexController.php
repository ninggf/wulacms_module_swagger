<?php

namespace swagger\controllers;

use backend\classes\AuthedController;
use backend\classes\PageMetaData;
use OpenApi\Generator;
use wulaphp\app\App;
use wulaphp\mvc\view\SmartyView;

/**
 * Swagger文档.
 *
 * @acl     r:swagger
 * @package swagger\controllers
 */
class IndexController extends AuthedController {
    /**
     * swagger文档首页.
     *
     * @return \wulaphp\mvc\view\SmartyView
     */
    public function index(): SmartyView {
        $data = PageMetaData::meta();
        $gps  = $this->apiGroup();

        $data['apiGp'] = json_encode(array_values($gps));

        return view('index', $data);
    }

    /**
     * 扫描生成API数据.
     *
     * @param string $api
     *
     * @return array
     */
    public function api(string $api = ''): array {
        $gps     = $this->apiGroup();
        $ag      = $gps[ $api ] ?? [
                'name'    => 'API',
                'url'     => App::url('swagger/api'),
                'paths'   => [''],
                'options' => []
            ];
        $paths   = $ag['paths'] ?? [''];
        $options = $ag['options'] ?? [];

        foreach ($paths as &$path) {
            $path = MODULES_PATH . $path;
        }

        $api  = Generator::scan($paths, $options);
        $data = $api->toJson();

        return json_decode($data, true);
    }

    private function apiGroup() {
        $gps = apply_filter('swagger\apiGroup', []);
        if (!$gps) {
            $gps = [
                '*' => [
                    'name'    => 'API',
                    'url'     => App::url('swagger/api'),
                    'paths'   => [''],
                    'options' => []
                ]
            ];
        }

        return $gps;
    }
}