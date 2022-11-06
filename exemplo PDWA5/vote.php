<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// database connection will be here
// include database and object files
include_once 'config/database/Database.php';
include_once 'objects/Product.php';
session_start();
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$product = new Product($db);
  
// read products will be here

// query products
$stmt = $product->read();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if(isset($_GET['id'])){

	if(isset($_COOKIE['voto_cont'])){

		$_SESSION['msg'] = "<span style='color: red'>Você já votou!</span>";
		header("Location: index.php");
	}
    else{
		setcookie('voto_cont', $_SERVER['REMOTE_ADDR'], time() + 5);
		$result_produto = "UPDATE produtos SET qnt_voto=qnt_voto + 1
		WHERE id ='".$_GET['id']."'"; 
		$resultado_produto = mysqli_query($conn, $result_produto);
		
		if(mysqli_affected_rows($conn)){
			$_SESSION['msg'] = "<span style='color: green'>Voto recebido com sucesso!</span>";
			header("Location: index.php");
		}else{
			$_SESSION['msg'] = "<span style='color: red'>Erro ao votar!</span>";
			header("Location: index.php");
		}
	}
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show products data in json format
    echo json_encode($products_arr);
}
  

