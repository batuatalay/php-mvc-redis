<?php 
require_once __DIR__ . "/../model/category.model.php";
spl_autoload_register( function($className) {
	if($className == "SimpleController") {
		$fullPath = "simple.controller.php";
	}else {
		$extension = ".controller.php";
		$fullPath = strtolower($className) . $extension;
	}
	require_once $fullPath;
});

class Category extends SimpleController{

	public static function getAll() {
		$categoryObj = new CategoryModel();
		$categories = $categoryObj->getAll();
		var_dump($categories);exit;
	}

	public function getByCode($code) {
		$categoryObj = new CategoryModel([
			"code" => $code
		]);
		$category = $categoryObj->getByCode();
		var_dump($category);
	}
}