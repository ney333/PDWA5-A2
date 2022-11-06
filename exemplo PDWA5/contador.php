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
  
// initialize object
$product = new Product($db);
  
// read products will be here

// query products
$stmt = $product->read();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $products_arr=array();
    $products_arr["records"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop

$sql_insert = "INSERT INTO contador_de_visitas(ip) VALUES('$ip')";
// Executa a Declara��o SQL, fazendo assim, inserir o IP no BD.
$query_insert = mysql_query($sql_insert);
// Condi��o para ver se o IP foi adicionado no DB.

if($query_insert){
	// Essa � a chave mestra, declara��o SQL que ir� selecionar os IDs, sempre o �ltimo que foi adicionado.
	$sql_query = "SELECT * FROM `contador_de_visitas` ORDER BY `contador_de_visitas`.`id` DESC LIMIT 1";
	// Executa a declara��o SQL, fazendo funcionar.
	$query_result = mysql_query($sql_query);
	// Organiza os resultados em uma linha.
	$row = mysql_num_rows($query_result);
		// Verifica se foi criada a linha 1 ou mais, caso contr�rio dar� uma mensagem de error.
		if($row != 0){
			// Organiza o resultado de linhas dentro de um vetor.
			while($row = mysql_fetch_array($query_result)){
			// Busca a vari�vel $id dentro da linha ID que est� dentro de um vetor.
			$id = $row['id'];
			// Exibe a mensagem na dela das visitas que tiveram.
			echo "Contador de visitas: <b>$id</b>";
			}
		
		} else {echo "Error.";} 
} else {echo "N�o foi executar o contador.";}

   

  
    // set response code - 200 OK
    http_response_code(200);
  
    // show products data in json format
    echo json_encode($products_arr);
}
  

