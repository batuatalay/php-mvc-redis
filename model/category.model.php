<?php
class CategoryModel extends Mysql
{
	private $id;
	private $code;
	private $title;
	private $pdo;
	private $redis;

	public function __construct($arr = [])
	{
		$this->pdo = $this->connect();
		foreach ($arr as $key => $value) {
			$this->$key = $value;
		}
		$this->redis = $this->redisConnection();
	}
	public function getAll() {
		$data = $this->getFromRedis($this->redis, "categories");
		if($data) {
			return $data;
		}
		else {
			$sql = "SELECT * FROM CATEGORIES";
			$categoryObj = $this->pdo->prepare($sql);
			$categoryObj->execute();
			$categories = $categoryObj->fetchAll(PDO::FETCH_ASSOC);
			$this->set2Redis($this->redis,"category",$categories);
			return $categories;
		}
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

	public function getByCode() {
		$data = $this->getFromRedis($this->redis, "category");
		if($data) {
			echo 'come from redis <br/>';
			return $data;
		}
		$sql = "SELECT * FROM CATEGORIES WHERE code = ?";
		$categoryObj = $this->pdo->prepare($sql);
		$categoryObj->execute([$this->code]);
		$result = $categoryObj->fetchAll(PDO::FETCH_ASSOC);
		$this->set2Redis($this->redis,"category",$result);
		return $result;
	}
}