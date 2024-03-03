<?php
require_once BASE . "/router.php";
class Router extends BaseRouter {
}
$route = new Router();
$route->get('/category', "Category@getAll");
$route->get('/category/#code', "Category@getByCode");
