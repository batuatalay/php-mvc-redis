<?php 
require_once __DIR__ . "/../model/manager.model.php";
spl_autoload_register( function($className) {
	if($className == "SimpleController") {
		$fullPath = "simple.controller.php";
	}else {
		$extension = ".controller.php";
		$fullPath = strtolower($className) . $extension;
	}
	require_once $fullPath;
});

class Login extends SimpleController{

	public static function loginPage() {
		self::view('login', 'index', '');
	}

	public function signIn ($data) {
		$manager = new ManagerModel([
			"username" => $data['username']
		]);
		$result = $manager->get();
		if($result && $result['password'] == hash('sha256',$data['password'])) {
			setcookie("username", $result['username'], time() + 3600*24, "/");
			$result['lastLogin'] = date('Y-m-d H:i:s');
			$loginManager = new ManagerModel($result);
			$loginManager->save();
			header("Location: /main");
		} else {
			self::view('login', 'index', "Giriş başarısız oldu");
		}
	}
	
	public function signOut(){
		setcookie("username", "", time() - 3600, "/");
		header("Location: /login");
	}
}