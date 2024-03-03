<?php
/**
 * 
 */
class Mysql {
	
	public function connect() {
		try {
		  $conn = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
		  return $conn;
		} catch(PDOException $e) {
		  echo "Connection failed: " . $e->getMessage();
		}
	}
    
    public function redisConnection() {
        try {
            $redis = new Redis();
            $redis->connect(REDISHOST, REDISPORT);
            return $redis;
        } catch (Exception $e) {
            var_dump($e);exit;
        }
    }

    public function getFromRedis($redis, $key) {
        if($redis->get($key) !== false) {
            $data = json_decode($redis->get($key));
            return $data;
        } else {
            return false;
        }
    }

    public function set2Redis($redis, $key, $value) {
        $redis->set($key,json_encode($value));
    }
	
	public function return($code, $message) {
    	echo json_encode(['code' => $code, 'message'=> $message]);
        exit;
    }

    public function seflink($text){
        $find = array("/Ğ/","/Ü/","/Ş/","/İ/","/Ö/","/Ç/","/ğ/","/ü/","/ş/","/ı/","/ö/","/ç/");
        $degis = array("G","U","S","I","O","C","g","u","s","i","o","c");
        $text = preg_replace("/[^0-9a-zA-ZÄzÜŞİÖÇğüşıöç]/"," ",$text);
        $text = preg_replace($find,$degis,$text);
        $text = preg_replace("/ +/"," ",$text);
        $text = preg_replace("/ /","-",$text);
        $text = preg_replace("/\s/","",$text);
        $text = strtolower($text);
        $text = preg_replace("/^-/","",$text);
        $text = preg_replace("/-$/","",$text);
        return $text;
    }
}

?>