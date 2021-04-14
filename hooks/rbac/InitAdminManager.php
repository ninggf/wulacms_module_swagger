<?php

namespace swagger\hooks\rbac;

use wulaphp\hook\Handler;

class InitAdminManager extends Handler {
    public function handle(...$args) {
        $viewOpName = __('View');
        /**@var \wulaphp\auth\AclResourceManager $manager */
        $manager = $args[0];
        $manager->getResource('swagger', __('Api Document'))->addOperate('r', $viewOpName);
    }
}