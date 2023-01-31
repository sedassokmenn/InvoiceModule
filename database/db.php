<?php 
$db_hostname = "localhost";
$db_dbname = "invoicemodule";
$db_username = "root";
$db_password = "";
try {

	$db=new PDO("mysql:host=$db_hostname;dbname=$db_dbname;charset=utf8", $db_username, $db_password);
	$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

}catch (PDOException $e) {

	exit("Failed to get DB handle: " . $e->getMessage() . "\n");
}
?>