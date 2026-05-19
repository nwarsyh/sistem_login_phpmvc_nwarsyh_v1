<?php
define('APPROOT', __DIR__ . '/');
define('CONFIG_PATH', APPROOT . 'config/');
define('CONTROLLER_PATH', APPROOT . 'controllers/');
define('MODEL_PATH', APPROOT . 'models/');
define('CORE_PATH', APPROOT . 'routing/');
define('VIEW_PATH', APPROOT . 'views/');

require_once CONFIG_PATH . 'config.php';

require_once CORE_PATH . 'RouteLogin.php';
require_once CORE_PATH . 'ControllerLogin.php';
require_once CORE_PATH . 'DatabaseLogin.php';
