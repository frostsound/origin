<?php

class DBConnection {
		private $host = 'localhost';
		private $user = 'root';
		private $pass = '';
		private $DB = 'mylogsbd';
	public function DBconnect(){
		$connect = mysqli_connect($this->host,$this->user,$this->pass,$this->DB);
		$connect->set_charset("utf8");
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();}
		else {
			echo ("Successfully Connected <BR />");
		}
	return $connect;
	}	
}

class LogFiles{
	public function WriteInFile($message){
		$directory = "./logs/";
		$name ="Log_".date("m_d"). ".txt";

			if(is_object($message)){
				file_put_contents($directory.$name,PHP_EOL . PHP_EOL . date("[Y-m-d H:i:s] - Обьект") . PHP_EOL . '$message->' .get_class($message) , FILE_APPEND);
			}
			elseif(is_array ($message)){
				file_put_contents($directory.$name,PHP_EOL . PHP_EOL . date("[Y-m-d H:i:s] - Массив") . PHP_EOL . implode(",", $message) , FILE_APPEND);
			}
			elseif(is_string ($message)){	
				file_put_contents($directory.$name,PHP_EOL . PHP_EOL . date("[Y-m-d H:i:s] - Строка ") . PHP_EOL . $message , FILE_APPEND);
			}
			else {
				file_put_contents($directory.$name,PHP_EOL . PHP_EOL . date("[Y-m-d H:i:s] - Исключение ") . PHP_EOL . 'Неверный тип параметра!' , FILE_APPEND);
				throw new Exception('Неверный тип параметра!');}
	}
}

class BDLog{
	public function WriteInBD($message){
		$directory = "./logs/";
		$name ="Log_".date("m_d"). ".txt";
		$Con = new DBConnection();
		$constring = $Con->DBconnect();
			if(is_object($message)){
				$t_string = '$message->' . get_class($message);
				$sql = mysqli_query($constring, "INSERT INTO MyLogTable (id, name, message, date) VALUES(null, 'Обьект','$t_string', NOW())");
			}
			elseif(is_array ($message)){
				$t_string = implode(",", $message);
				printf ($t_string);
				$sql = mysqli_query($constring, "INSERT INTO MyLogTable (id, name, message, date) VALUES(null, 'Обьект','$t_string', NOW())");
			}
			elseif(is_string ($message)){
				$sql = mysqli_query($constring, "INSERT INTO MyLogTable (id, name, message, date) VALUES(null, 'Строка','$message', NOW())");
			}
			else {
				$sql = mysqli_query($constring, "INSERT INTO MyLogTable (id, name, message, date) VALUES(null, 'Исключение','Неверный тип параметра!', NOW())");
				throw new Exception('Неверный тип параметра!');}
			mysqli_close($constring);
	}
}

//$mes = 1;
$mes = array("foo", "bar", "you", "world");
//$mes = new LogFiles();
//$mes = "авыфаываывап";
$log = new LogFiles();
try{
	$log->WriteInFile($mes);}
catch (Exception $e){
echo 'Сообщение: '. $e->getMessage().'<br />';}


$logBD = new BDLog();
$logBD->WriteInBD($mes);

www
?>

