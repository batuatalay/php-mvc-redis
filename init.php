<?php
define("DEVELOPMENT", true);
if(DEVELOPMENT) {
	define("ENV", "http://localhost/");
	define("BASE", "/var/www/html/");
} else {
	define("ENV", "your website url");
	define("BASE", "your website directory location");
}
define("DBHOST", "mysql");
define("DBNAME", "web-app");
if(DEVELOPMENT) {
	define("DBUSERNAME", "ironman");
	define("DBPASSWORD", "1q2w3e4r");
	define("REDISHOST", "redis_server");
	define("REDISPORT", "6379");
} else {
	define("DBUSERNAME", "test");
	define("DBPASSWORD", "test");
}

