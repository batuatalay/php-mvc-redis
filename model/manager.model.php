<?php
class ManagerModel extends Mysql
{
	private $id;
	private $name;
	private $phone;
	private $username;
	private $password;
	private $status;
	private $lastLogin;
	
	public function __construct($arr = [])
	{
		$this->pdo = $this->connect();
		foreach ($arr as $key => $value) {
			$this->$key = $value;
		}
	}
	public function get() {
		if($this->username) {
			$result = $this->pdo->prepare("SELECT * FROM MANAGERS WHERE username = ?");
			$result->execute([$this->username]); 
			$managers = $result->fetch(PDO::FETCH_ASSOC);
		} else {
			$result = $this->pdo->prepare("SELECT * FROM MANAGERS");
			$result->execute(); 
			$managers = $result->fetchAll(PDO::FETCH_ASSOC);
		}
		return $managers;
		
	}

	public function save() {
		$sql = "INSERT INTO MANAGERS (name, phone, username, password, status) VALUES (?, ?, ?, ?, ?) 
		ON DUPLICATE KEY UPDATE name = ?, phone = ?, username = ?, password = ?, status = ?, lastLogin = ? ";
		$manager = $this->pdo->prepare($sql);
		$status = $manager->execute([$this->name, $this->phone, $this->username, $this->password, $this->status,$this->name, $this->phone, $this->username, $this->password, $this->status,$this->lastLogin]);
		if($status === false) {
			echo 'Kişi eklenemedi lütfen kontrol ediniz';
		}
	}
}