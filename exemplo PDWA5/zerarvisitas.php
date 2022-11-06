<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// database connection will be here
// include database and object files
include_once 'config/database/Database.php';
include_once 'objects/Product.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

$sql = "TRUNCATE TABLE `contador_de_visitas`";
// Executa a declara��o SQL.
$query = mysql_query($sql);

if($query){
echo "Contador foi limpo com sucesso.";
} else {echo "Erro ao limpar o contador.";}


?>