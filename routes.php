<?php
$pages = array(
    'error' => ['errors'],
    'main' => ['layouts', 'about', 'services', 'login', 'register', 'profile', 'product', 'cart'],
    'admin' => ['layouts', 'members', 'products', 'news', 'comments']
);
$controllers = array(
    'errors' => ['index'],
    'layouts' => ['index'],
    'cart' => ['index', 'delete',],

    'members' => ['index', 'addUser', 'edit', 'getAll'],
    'product' => ['index', 'add', 'edit', 'delete', 'getAll', 'search', 'getDetail', 'addToCart', 'getPay', 'pay', 'getFilter', 'buyNow'],
    'products' => ['index', 'add', 'edit', 'delete', 'getAll', 'search', 'getDetail', 'addToCart', 'getPay', 'pay', 'getFilter', 'buyNow'],
    'news' => ['index', 'add', 'edit', 'delete', 'hide'],
    'comments' => ['index', 'hide', 'add', 'edit', 'delete'],
    'admin' => ['index', 'add', 'edit', 'delete'],
    'user' => ['index', 'add', 'editInfo', 'editPass', 'delete'],
    'company' => ['index', 'add', 'edit', 'delete'],
    'login' => ['index', 'check', 'logout'],

    'about' => ['index'],
    'services' => ['index'],
    'register' => ['index', 'submit', 'editInfo'],
    'profile' => ['index', 'editInfo', 'getAddress', 'updateAddress'],



    'paginate' => ['index'],
    'paginateuser' => ['index']


);



if (!array_key_exists($page, $pages) || !array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $page = 'error';
    $controller = 'errors';
    $action = 'index';
}
if ($page == 'error') {
    $controller = 'errors';
    $action = 'index';
}

require_once('/xampp/htdocs/dbms_app/controllers/' . $page . "/" . $controller . '_controller.php');

$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();
