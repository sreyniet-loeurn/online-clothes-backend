<?php
 header("Access-Control-Allow-Origin: *");
 header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
 header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
 header('Content-Type: application/json');
/*
 * Following code will list all the products
 */
 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();
 
// get all products from pro$product table
$result = mysqli_query($db->connect(), "SELECT *FROM product");

 $json_data = array();
 while($row = mysqli_fetch_assoc($result))
 {
     $json_data[] = $row;
 }
 echo json_encode(['viewproduct'=> $json_data]);

?>