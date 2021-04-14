<?php

namespace swagger\hooks\backend;

use wulaphp\app\App;
use wulaphp\hook\Handler;

class InitDashboard extends Handler {
    protected $acceptArgs = 2;

    public function handle(...$args) {
        /**@var \backend\classes\Dashboard $dashboard */
        $dashboard = $args[0];
        /**@var \system\classes\AdminPassport $passport */
        $passport = $args[1];
        if ($passport->cando('r:swagger')) {
            $naviMenu     = $dashboard->naviMenu();
            $doc          = $naviMenu->get('apidoc', __('Api Document'), 1000000000);
            $doc->url     = App::url('swagger');
            $doc->iconCls = 'layui-icon-read';
            $doc->target  = '_blank';
        }
    }
}